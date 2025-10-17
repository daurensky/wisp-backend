<?php

namespace App\Listeners\Server;

use App\Models\ServerCategory;
use App\Events\Server\ServerCreated;
use App\Enums\Server\ChannelTypeEnum;
use Illuminate\Contracts\Queue\ShouldQueue;

class FillStandardServer implements ShouldQueue
{
    public function __construct()
    {
    }

    public function handle(ServerCreated $event): void
    {
        /** @var ServerCategory $text */
        $text = $event->server->categories()->create([
            'name' => 'Текстовые каналы'
        ]);

        $text->channels()->create([
            'name' => 'основной',
            'type' => ChannelTypeEnum::TEXT
        ]);

        /** @var ServerCategory $voice */
        $voice = $event->server->categories()->create([
            'name' => 'Голосовые каналы'
        ]);

        $voice->channels()->create([
            'name' => 'Основной',
            'type' => ChannelTypeEnum::VOICE
        ]);
    }
}
