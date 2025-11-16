<?php

namespace App\Http\Resources\Server;

use Illuminate\Http\Request;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ServerChannelMemberResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'                => $this->id,
            'channel_id'        => $this->server_channel_id,
            'user'              => UserResource::make($this->user),
            'is_screen_sharing' => $this->is_screen_sharing
        ];
    }
}
