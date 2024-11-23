<?php

namespace App\Services;

use App\Contracts\NotificationServiceInterface;
use App\Http\Requests\GetUserNotificationsRequest;
use App\Models\Notification;
use App\Models\User;
use Exception;

class NotificationService implements NotificationServiceInterface
{
    public function getUserNotifications(GetUserNotificationsRequest $request)
    {
        try {
            $notifications = Notification::query();
            $notifications->where('notifiable_type', User::class)
            ->where('notifiable_id', $request->user_id)
            ->where(function ($query) {
                $query->where('read_at', null)
                ->orWhere('created_at', '>=', now()->subDays(3));
            })->orderBy('created_at')
            ->get()->all();

            return $notifications;
        } catch (Exception $exception) {
            throw $exception;
        }
    }
}
