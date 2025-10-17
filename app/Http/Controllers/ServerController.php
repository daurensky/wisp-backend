<?php

namespace App\Http\Controllers;

use App\Models\Server;
use App\Models\ServerCategory;
use App\Events\Server\ServerCreated;
use App\Http\Resources\Server\ServerResource;
use App\Http\Requests\Server\ServerStoreRequest;
use App\Http\Requests\ServerStoreCategoryRequest;
use App\Http\Resources\Server\ServerChannelResource;
use App\Http\Resources\Server\ServerCategoryResource;
use App\Http\Requests\Server\ServerStoreChannelRequest;
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

        ServerCreated::dispatch($server);

        return new ServerResource($server);
    }

    public function show(Server $server): ServerResource
    {
        return new ServerResource($server);
    }

    public function storeCategory(Server $server, ServerStoreCategoryRequest $request): ServerCategoryResource
    {
        $category = $server->categories()
            ->create($request->only([
                'name'
            ]));

        return new ServerCategoryResource($category);
    }

    public function storeChannel(ServerCategory $category, ServerStoreChannelRequest $request): ServerChannelResource
    {
        $channel = $category->channels()
            ->create($request->only([
                'name',
                'type'
            ]));

        return new ServerChannelResource($channel);
    }
}
