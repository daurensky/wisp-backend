<?php

namespace App\Models;

use App\Enums\Peer\SdpTypeEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Peer extends Model
{
    use HasUuids;

    protected $fillable = [
        'peerable_id',
        'peerable_type',
        'user_id',
        'sdp',
        'type'
    ];

    protected $casts = [
        'type' => SdpTypeEnum::class
    ];

    public function peerable(): MorphTo
    {
        return $this->morphTo();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
