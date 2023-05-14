<?php

namespace App\Events;

use App\Models\Task;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TaskCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public function __construct(public Task $data)
    {
    }

    public function broadcastOn(): Channel
    {
        return new Channel('task-added');
    }

    public function broadcastAs(): string
    {
        return 'task-event';
    }

}
