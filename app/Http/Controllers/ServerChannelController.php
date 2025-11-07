<?php

namespace App\Http\Controllers;

use App\Models\ServerChannel;
use Illuminate\Http\JsonResponse;
use App\Events\Server\PeerConnected;
use App\Http\Resources\Server\ServerChannelResource;
use App\Http\Requests\Server\ServerChannelStoreRequest;
use App\Http\Requests\Server\ServerChannelConnectRequest;

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

    public function connect(ServerChannel $channel, ServerChannelConnectRequest $request): JsonResponse
    {
        $peer = $channel->peers()
            ->create(array_merge($request->only([
                'type',
                'sdp',
            ]), [
                'user_id' => auth()->id()
            ]));

        event(new PeerConnected($channel, $peer));

        return response()->json(['success' => true]);
    }

    public function disconnect(ServerChannel $channel)
    {

    }
}
