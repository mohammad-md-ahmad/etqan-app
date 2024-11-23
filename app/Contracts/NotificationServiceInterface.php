<?php

namespace App\Contracts;

use App\Http\Requests\GetUserNotificationsRequest;
use App\Http\Requests\SearchRequest;

interface NotificationServiceInterface
{
    public function getUserNotifications(GetUserNotificationsRequest $request);
}
