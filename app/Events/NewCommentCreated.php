<?php

namespace App\Events;

use App\Models\Projects;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewCommentCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Data that will be passed on broadcasts
     *
     * 
     */
    public $projectId;
    public $commentHTML;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($commentHTML, $projectId)
    {
        $this->projectId = $projectId;
        $this->commentHTML = $commentHTML;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('project.'.$this->projectId);
    }
}
