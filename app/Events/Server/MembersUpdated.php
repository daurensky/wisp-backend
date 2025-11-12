<?php

namespace App\Events\Server;

use App\Models\ServerChannel;
use Illuminate\Queue\SerializesModels;
use App\Http\Resources\User\UserResource;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class MembersUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(
        public string $channelId,
    )
    {
    }

    public function broadcastAs(): string
    {
        return 'channel.members.updated';
    }

    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('server-channel.'.$this->channelId),
        ];
    }

    public function broadcastWith(): array
    {
        $channel = ServerChannel::with(['members'])
            ->find($this->channelId);

        return UserResource::collection($channel->members)->resolve();
    }
}
