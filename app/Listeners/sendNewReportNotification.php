<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Report;
use App\Notifications\newReportNotification;
use Notification;
use App\Events\ReportCreated;

class sendNewReportNotification
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
     * @param  object  $event
     * @return void
     */
    public function handle(ReportCreated $event)
    {
        $admins = User::where('role_id', 1)->get();

        Notification::send($admins, new newReportNotification($event->report));
    }
}
