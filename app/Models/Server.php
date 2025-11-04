<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use App\Observers\ServerObserver;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Http\Resources\Server\ServerResource;
use Illuminate\Database\Eloquent\BroadcastsEvents;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

#[ObservedBy(ServerObserver::class)]
class Server extends Model implements HasMedia
{
    use HasUuids;
    use InteractsWithMedia;
    use BroadcastsEvents;

    protected $fillable = [
        'name',
        'author_id'
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function categories(): HasMany
    {
        return $this->hasMany(ServerCategory::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'server_user');
    }

    public function broadcastWith(string $event): array
    {
        return ServerResource::make($this)->resolve();
    }
}
