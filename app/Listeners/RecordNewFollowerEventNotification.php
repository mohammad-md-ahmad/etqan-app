<?php

namespace App\Listeners;

use App\Events\NewFollower;
use App\Models\Notification;
use App\Models\User;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RecordNewFollowerEventNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(NewFollower $event): void
    {
        try {
            $notificationRecord = new Notification();

            $notificationRecord->type = $event::class;
            $notificationRecord->notifiable_type = User::class;
            $notificationRecord->notifiable_id = Auth::user()->id;
            $notificationRecord->payload = json_encode($event->message);
            $notificationRecord->save();
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
        }
    }
}
