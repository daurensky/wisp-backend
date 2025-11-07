<?php

namespace App\Models;

use App\Models\Scopes\SortScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Database\Eloquent\BroadcastsEvents;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Http\Resources\Server\ServerCategoryResource;

#[ScopedBy(SortScope::class)]
class ServerCategory extends Model
{
    use HasUuids;
    use BroadcastsEvents;

    protected $fillable = [
        'server_id',
        'name',
        'sort'
    ];

    public function channels(): HasMany
    {
        return $this->hasMany(ServerChannel::class);
    }

    public function server(): BelongsTo
    {
        return $this->belongsTo(Server::class);
    }

    protected static function booted(): void
    {
        static::creating(function ($model) {
            $maxSort = static::where('server_id', $model->server_id)->max('sort');
            $model->sort = $maxSort ? $maxSort + 1 : 1;
        });
    }

    public function broadcastOn(string $event): array
    {
        return [
            new PrivateChannel('server.'.$this->server_id)
        ];
    }

    public function broadcastWith(string $event): array
    {
        return ServerCategoryResource::make($this)->resolve();
    }
}
