<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewFollower implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    protected $following;

    /**
     * Create a new event instance.
     */
    public function __construct(
        protected User $follower,
        protected string $following_type,
        protected string $following_id,
        public string $message,
    ) {
        $this->following = app()->make($this->following_type)->findOrFail($this->following_id);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel(env('NEW_FOLLOWER_BROADCAST_CHANNEL', 'new-follower').'.'.$this->following->id),
        ];
    }

    public function broadcastAs()
    {
        return env('NEW_FOLLOWER_BROADCAST_EVENT', 'new-follower-event');
    }

    public function broadcastWith()
    {
        return [
            'message' => $this->message,
        ];
    }
}
