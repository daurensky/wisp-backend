<?php

namespace App\Listeners\User;

use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;

class FillStandardUser implements ShouldQueue
{
    public function __construct()
    {
    }

    public function handle(Registered $event): void
    {
        $url = 'https://api.dicebear.com/9.x/big-smile/png?backgroundColor=262C37';

        $event->user
            ->addMediaFromUrl($url)
            ->toMediaCollection('avatar');
    }
}
