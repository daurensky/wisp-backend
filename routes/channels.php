<?php

use App\Models\User;
use App\Models\Server;
use App\Models\ServerChannel;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int)$user->id === (int)$id;
});

Broadcast::channel('App.Models.Server.{server}', function (User $user, Server $server) {
    return $server->users()
        ->where('users.id', $user->id)
        ->exists();
});

Broadcast::channel('call.{id}', function ($user, $id) {
    return true; // без авторизации, для теста
});

Broadcast::channel('server.{server}', function (User $user, Server $server) {
    return $server->users()
        ->where('users.id', $user->id)
        ->exists();
});

Broadcast::channel('server-channel.{channel}', function (User $user, ServerChannel $channel) {
    return $channel->category->server->users()
        ->where('users.id', $user->id)
        ->exists();
});
