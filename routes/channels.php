<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel(env('NEW_FOLLOWER_BROADCAST_CHANNEL').'.{followingId}', function ($user, $followingId) {
    return $user->id == $followingId;
});
