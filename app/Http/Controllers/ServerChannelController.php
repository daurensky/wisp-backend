<?php

namespace App\Http\Controllers;

use App\Models\ServerChannel;
use App\Http\Resources\Server\ServerChannelResource;
use App\Http\Requests\Server\ServerChannelStoreRequest;

class ServerChannelController extends Controller
{
    public function store(ServerChannelStoreRequest $request): ServerChannelResource
    {
        $channel = ServerChannel::query()
            ->create($request->only([
                'server_category_id',
                'name',
                'type'
            ]));

        return new ServerChannelResource($channel);
    }

    public function show(ServerChannel $channel): ServerChannelResource
    {
        return new ServerChannelResource($channel);
    }
}
