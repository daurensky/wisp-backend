<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Database\Eloquent\BroadcastsEvents;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Http\Resources\Server\ServerChannelMemberResource;

class ServerChannelMember extends Model
{
    use HasUuids;
    use BroadcastsEvents;

    protected $fillable = [
        'server_channel_id',
        'user_id',
        'is_screen_sharing'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function channel(): BelongsTo
    {
        return $this->belongsTo(ServerChannel::class);
    }

    public function broadcastOn(string $event): array
    {
        return [
            new PrivateChannel('server-channel.'.$this->server_channel_id)
        ];
    }

    public function broadcastWith(): array
    {
        return ServerChannelMemberResource::make($this)->resolve();
    }
}
