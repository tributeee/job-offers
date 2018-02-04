<?php

namespace App\Events;

use App\JobOffer;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class JobOfferPosted
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var JobOffer
     */
    public $offer;

    /**
     * Create a new event instance.
     *
     * @param JobOffer $offer
     */
    public function __construct(JobOffer $offer)
    {
        $this->offer = $offer;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
