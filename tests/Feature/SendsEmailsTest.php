<?php

namespace Tests\Feature;

use App\JobOffer;
use App\Mail\JobOfferPosted as SentToHR;
use App\Notifications\JobOfferPosted as SentToModerator;
use App\Services\JobOfferService;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class SendsEmailsTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function emailsSentToHRAndModerator()
    {
        Mail::fake();
        Notification::fake();

        $user = factory(User::class)->create();

        $service = new JobOfferService();

        $service->create([
            'email' => 'test@test.com',
            'title' => 'Job Offer',
            'description' => 'Lorem ipsum dolor sit amet'
        ]);

        Mail::assertSent(SentToHR::class);

        Notification::assertSentTo($user, SentToModerator::class);
    }

    /** @test */
    public function emailSentToHROnlyForPublished()
    {
        Mail::fake();
        Notification::fake();

        $user = factory(User::class)->create();

        factory(JobOffer::class)->create(['email' => 'test@test.com','status' => 'published']);

        $service = new JobOfferService();

        $service->create([
            'email' => 'test@test.com',
            'title' => 'New Job Offer',
            'description' => 'Lorem ipsum dolor sit amet'
        ]);

        Mail::assertSent(SentToHR::class);

        Notification::assertNotSentTo($user, SentToModerator::class);
    }
}