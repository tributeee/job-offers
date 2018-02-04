<?php

namespace App\Listeners;

use App\Events\JobOfferPosted;
use App\JobOffer;
use App\Notifications\JobOfferPosted as NotifyModerator;
use App\Mail\JobOfferPosted as NotifyUser;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class JobOfferEventListener implements ShouldQueue
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
     *
     * @param JobOfferPosted|object $event
     * @return void
     */
    public function handle(JobOfferPosted $event)
    {
        if ($event->offer->status == JobOffer::STATUS_PENDING) {
            $users = User::all();
            foreach ($users as $user) {
                $user->notify(new NotifyModerator($event->offer));
            }
        }

        Mail::to($event->offer->email)->send(new NotifyUser($event->offer));
    }
}
