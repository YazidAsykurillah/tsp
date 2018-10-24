<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

use App\Repairment;

class RepairmentIsCompleted extends Event
{
    use SerializesModels;
    public $repairment;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Repairment $repairment)
    {
        $this->repairment = $repairment;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
