<?php

namespace App\Http\Resources\Server;

use Illuminate\Http\Request;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ServerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'         => $this->id,
            'name'       => $this->name,
            'avatar'     => $this->getFirstMediaUrl('avatar'),
            'author'     => new UserResource($this->author),
            'categories' => ServerCategoryResource::collection($this->categories),
        ];
    }
}
