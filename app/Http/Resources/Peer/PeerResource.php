<?php

namespace App\Http\Resources\Peer;

use Illuminate\Http\Request;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PeerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'   => $this->id,
            'user' => new UserResource($this->user),
            'type' => $this->type,
            'sdp'  => $this->sdp,
        ];
    }
}
