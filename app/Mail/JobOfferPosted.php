<?php

namespace App\Mail;

use App\JobOffer;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class JobOfferPosted extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * @var JobOffer
     */
    private $offer;

    /**
     * Create a new message instance.
     *
     * @param JobOffer $offer
     */
    public function __construct(JobOffer $offer)
    {
        $this->offer = $offer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $status = $this->offer->status == JobOffer::STATUS_PUBLISHED ? 'has been published' : 'is in moderation';
        $title = $this->offer->title;

        return $this->view('emails.notify_hr_manager', compact('status', 'title'));
    }
}
