<?php

namespace App\Enums\Server;

enum ChannelTypeEnum: string
{
    case TEXT = 'text';
    case VOICE = 'voice';
}
