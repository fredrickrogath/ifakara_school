<?php

namespace App\Events\Api\Secretary;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class StudentEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    // public $message;
    // public $actor;
    public $schoolId;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($schoolId)
    {
        $this->schoolId = $schoolId;
        // $this->actor = auth()->user()->id;
        // echo "<p>NewPostPublished('$data') object has been created.</p>";
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('school-student-trigger-from-financial-secretary.' . $this->schoolId);
}
}
    