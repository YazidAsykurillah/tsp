<?php

namespace App\Listeners;

use App\Events\RepairmentIsCompleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Issue;
use App\Repairment;

class ChangeIssueStatusToFinish
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
        $repairment = $event->repairment;
        $issue = Issue::findOrFail($repairment->issue_id);
        $issue->status = 'finished';
        $issue->save();
    }
}
