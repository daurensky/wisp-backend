<?php

namespace App\Enums\Peer;

enum SdpTypeEnum: string
{
    case OFFER = 'offer';
    case ANSWER = 'answer';
}
