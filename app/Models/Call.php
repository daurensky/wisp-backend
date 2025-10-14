<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Call extends Model
{
    use HasUuids;

    protected $fillable = [
        'offer',
        'answer',
    ];

    protected $casts = [
        'offer'  => 'array',
        'answer' => 'array'
    ];

    public function candidates(): HasMany
    {
        return $this->hasMany(CallCandidate::class);
    }
}
