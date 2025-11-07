<?php

namespace App\Http\Controllers;

use App\Models\ServerCategory;
use App\Http\Resources\Server\ServerCategoryResource;
use App\Http\Requests\Server\ServerCategoryStoreRequest;

class ServerCategoryController extends Controller
{
    public function store(ServerCategoryStoreRequest $request): ServerCategoryResource
    {
        $category = ServerCategory::query()
            ->create($request->only([
                'server_id',
                'name'
            ]));

        return new ServerCategoryResource($category);
    }
}
