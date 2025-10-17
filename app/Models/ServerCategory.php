<?php

namespace App\Models;

use App\Models\Scopes\SortScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;

#[ScopedBy(SortScope::class)]
class ServerCategory extends Model
{
    use HasUuids;

    protected $fillable = [
        'name',
        'sort'
    ];

    protected static function booted(): void
    {
        static::creating(function ($model) {
            $maxSort = static::where('server_id', $model->server_id)->max('sort');
            $model->sort = $maxSort ? $maxSort + 1 : 1;
        });
    }

    public function channels(): HasMany
    {
        return $this->hasMany(ServerChannel::class);
    }
}
