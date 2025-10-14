<?php

namespace App\Events;

use App\Models\Call;
use App\Models\CallCandidate;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class CandidateAdded implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(
        public Call          $call,
        public CallCandidate $candidate,
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
        return 'candidate-added';
    }

    public function broadcastWith(): array
    {
        return [
            'candidate' => [
                'candidate_data' => $this->candidate->candidate_data,
            ]
        ];
    }
}
