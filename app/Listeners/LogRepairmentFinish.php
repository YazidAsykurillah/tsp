<?php

namespace App\Listeners;

use App\Events\RepairmentIsCompleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogRepairmentFinish
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  RepairmentIsCompleted  $event
     * @return void
     */
    public function handle(RepairmentIsCompleted $event)
    {
        //
    }
}
