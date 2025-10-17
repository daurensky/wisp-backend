<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CallCandidate extends Model
{
    protected $keyType = 'string';

    protected $fillable = [
        'type',
        'call_id',
        'candidate_data'
    ];

    protected $casts = [
        'candidate_data' => 'array'
    ];

    public function activeCall(): BelongsTo
    {
        return $this->belongsTo(Call::class);
    }
}
