<?php

namespace App\Http\Controllers\Server;

use Illuminate\Http\Request;
use App\Models\ServerChannelMember;
use App\Http\Controllers\Controller;
use App\Http\Resources\Server\ServerChannelMemberResource;
use App\Http\Requests\Server\ServerChannelMemberStoreRequest;
use App\Http\Requests\Server\ServerChannelMemberUpdateRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ServerChannelMemberController extends Controller
{
    public function index(Request $request): AnonymousResourceCollection
    {
        $members = ServerChannelMember::where('server_channel_id', $request->get('server_channel_id'))
            ->get();

        return ServerChannelMemberResource::collection($members);
    }

    public function connect(ServerChannelMemberStoreRequest $request): ServerChannelMemberResource
    {
        $member = ServerChannelMember::updateOrCreate([
            'user_id' => auth()->id()
        ], array_merge([
            'is_screen_sharing' => false
        ], $request->validated()));

        return new ServerChannelMemberResource($member);
    }

    public function update(ServerChannelMember $member, ServerChannelMemberUpdateRequest $request): ServerChannelMemberResource
    {
        $member->update($request->validated());

        return new ServerChannelMemberResource($member);
    }

    public function destroy(ServerChannelMember $member): void
    {
        $member->delete();
    }
}
