<?php

namespace App\Models;

use App\Models\Scopes\SortScope;
use App\Enums\Server\ChannelTypeEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Database\Eloquent\BroadcastsEvents;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use App\Http\Resources\Server\ServerChannelResource;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

#[ScopedBy(SortScope::class)]
class ServerChannel extends Model
{
    use HasUuids;
    use BroadcastsEvents;

    protected $fillable = [
        'server_category_id',
        'type',
        'name',
        'sort'
    ];

    protected $casts = [
        'type' => ChannelTypeEnum::class
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(ServerCategory::class, 'server_category_id');
    }

    public function members(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'server_channel_member')
            ->withTimestamps();
    }

    protected static function booted(): void
    {
        static::creating(function ($model) {
            $maxSort = static::where('server_category_id', $model->server_category_id)->max('sort');
            $model->sort = $maxSort ? $maxSort + 1 : 1;
        });
    }

    public function broadcastOn(string $event): array
    {
        return [
            new PrivateChannel('server.'.$this->category->server_id)
        ];
    }

    public function broadcastWith(string $event): array
    {
        return ServerChannelResource::make($this)->resolve();
    }
}
