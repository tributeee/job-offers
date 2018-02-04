<?php

namespace App\Notifications;

use App\JobOffer;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class JobOfferPosted extends Notification
{
    use Queueable;
    /**
     * @var JobOffer
     */
    private $offer;

    /**
     * Create a new notification instance.
     *
     * @param JobOffer $offer
     */
    public function __construct(JobOffer $offer)
    {
        $this->offer = $offer;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $offer = $this->offer;

        return (new MailMessage)->subject('New job offer waiting for your approval')
                    ->view('emails.notify_moderator', compact('offer'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
