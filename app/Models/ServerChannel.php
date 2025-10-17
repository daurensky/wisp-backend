<?php

namespace App\Models;

use App\Models\Scopes\SortScope;
use App\Enums\Server\ChannelTypeEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;

#[ScopedBy(SortScope::class)]
class ServerChannel extends Model
{
    use HasUuids;

    protected $fillable = [
        'type',
        'name',
        'sort'
    ];

    protected $casts = [
        'type' => ChannelTypeEnum::class
    ];

    protected static function booted(): void
    {
        static::creating(function ($model) {
            $maxSort = static::where('server_category_id', $model->server_category_id)->max('sort');
            $model->sort = $maxSort ? $maxSort + 1 : 1;
        });
    }
}
