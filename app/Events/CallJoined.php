<?php

namespace App\Events;

use App\Models\Call;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class CallJoined implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(
        public Call $call,
    )
    {
    }

    public function broadcastOn(): array
    {
        return [
            new Channel('call.'.$this->call->id),
        ];
    }

    public function broadcastAs(): string
    {
        return 'call-joined';
    }

    public function broadcastWith(): array
    {
        return [
            'call' => [
                'id'     => $this->call->id,
                'answer' => $this->call->answer
            ]
        ];
    }
}
