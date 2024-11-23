<?php

namespace App\Http\Controllers;

use App\Contracts\NotificationServiceInterface;
use App\Contracts\SearchServiceInterface;
use App\Http\Requests\GetUserNotificationsRequest;
use App\Http\Requests\SearchRequest;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class NotificationsController extends Controller
{
    public function __construct(
        protected NotificationServiceInterface $notificationService,
    ) {
    }

    public function getUserNotifications(GetUserNotificationsRequest $request)
    {
        try {
            $notifications = $this->notificationService->getUserNotifications($request);

            return response()->json([
                'message' => trans('Notifications have been retrieved successfully'),
                'data' => $notifications->toArray()
            ], Response::HTTP_OK);
        } catch (Exception $exception) {
            Log::error($exception->getMessage());

            return response()->json(['message' => trans('Something wrong occurred')], Response::HTTP_BAD_REQUEST);
        }
    }
}
