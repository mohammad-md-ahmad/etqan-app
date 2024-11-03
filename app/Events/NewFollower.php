<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class NewFollower implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    // protected User $follower;
    // protected Model $following_type;
    // protected string $following_id;
    // protected string $message;

    /**
     * Create a new event instance.
     */
    public function __construct(
        protected User $follower,
        protected string $following_type,
        protected string $following_id,
        protected string $message
    ) {
        Log::info('new follower event is fired!');
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel(env('NEW_FOLLOWER_BROADCAST_CHANNEL', 'new-follower')),
        ];
    }

    public function broadcastAs()
    {
        return 'new-follower-event';
    }

    public function broadcastWith()
    {
        return [
            'data' => [
                'anything',
            ],
        ];
    }
}
