<?php

namespace App\Events\Server;

use App\Models\Peer;
use App\Models\ServerChannel;
use Illuminate\Queue\SerializesModels;
use App\Http\Resources\Peer\PeerResource;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PeerConnected implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(
        private readonly ServerChannel $channel,
        private readonly Peer          $peer
    )
    {
    }

    public function broadcastAs(): string
    {
        return 'peer.connected';
    }

    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('server-channel.'.$this->channel->id),
        ];
    }

    public function broadcastWith(): array
    {
        return PeerResource::make($this->peer)->resolve();
    }
}
