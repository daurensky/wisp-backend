<?php

namespace App\Observers;

use App\Models\Server;
use App\Models\ServerCategory;
use App\Enums\Server\ChannelTypeEnum;

class ServerObserver
{
    public function created(Server $server): void
    {
        /** @var ServerCategory $text */
        $text = $server->categories()->create([
            'name' => 'Текстовые каналы'
        ]);

        $text->channels()->create([
            'name' => 'основной',
            'type' => ChannelTypeEnum::TEXT
        ]);

        /** @var ServerCategory $voice */
        $voice = $server->categories()->create([
            'name' => 'Голосовые каналы'
        ]);

        $voice->channels()->create([
            'name' => 'Основной',
            'type' => ChannelTypeEnum::VOICE
        ]);
    }
}
