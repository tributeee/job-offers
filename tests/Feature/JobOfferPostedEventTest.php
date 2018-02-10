<?php

namespace Tests\Feature;

use App\Events\JobOfferPosted;
use App\Services\JobOfferService;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class JobOfferPostedEventTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function jobOfferPosting()
    {
        Event::fake();

        $service = new JobOfferService();

        $offer = $service->create([
            'email' => 'test@test.com',
            'title' => 'Job Offer',
            'description' => 'Lorem ipsum dolor sit amet'
        ]);

        Event::assertDispatched(JobOfferPosted::class, function ($e) use ($offer) {
            return $e->offer->id === $offer->id;
        });
    }
}
