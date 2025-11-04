<?php

namespace App\Http\Controllers;

use App\Models\Server;
use App\Http\Resources\Server\ServerResource;
use App\Http\Requests\Server\ServerStoreRequest;
use App\Http\Requests\Server\ServerUpdateRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;

class ServerController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $servers = auth()->user()->servers()
            ->get();

        return ServerResource::collection($servers);
    }

    /**
     * @throws FileIsTooBig
     * @throws FileDoesNotExist
     */
    public function store(ServerStoreRequest $request): ServerResource
    {
        /** @var Server $server */
        $server = auth()->user()->servers()
            ->create(array_merge($request->only([
                'name'
            ]), [
                'author_id' => auth()->id()
            ]));

        if ($request->hasFile('avatar')) {
            $server->addMedia($request->file('avatar'))
                ->toMediaCollection('avatar');
        }

        return new ServerResource($server);
    }

    public function show(Server $server): ServerResource
    {
        return new ServerResource($server);
    }

    public function update(Server $server, ServerUpdateRequest $request): ServerResource
    {
        $server->update($request->only([
            'name'
        ]));

        if ($request->hasFile('avatar')) {
            $server->updateMedia($request->file('avatar'), 'avatar');
        }

        return new ServerResource($server);
    }
}
