<?php

namespace Tests\Unit;

use App\JobOffer;
use App\Services\JobOfferService;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class JobOfferTest extends TestCase
{
    use DatabaseTransactions;

    protected $jobOfferService;

    public function setUp()
    {
        parent::setUp();

        $this->jobOfferService = new JobOfferService();
    }

    /** @test */
    public function createPendingJobOffer()
    {
        $offer = $this->createOffer();

        $this->assertEquals(JobOffer::STATUS_PENDING, $offer->status);
    }

    /** @test */
    public function jobOfferChangeStatusToPublished()
    {
        $offer = $this->createOffer();

        $this->jobOfferService->updateStatus($offer, 'publish');

        $this->assertEquals(JobOffer::STATUS_PUBLISHED, $offer->status);
    }

    /** @test */
    public function jobOfferChangeStatusToSpam()
    {
        $offer = $this->createOffer();

        $this->jobOfferService->updateStatus($offer, 'mark-spam');

        $this->assertEquals(JobOffer::STATUS_SPAM, $offer->status);
    }

    /** @test */
    public function secondJobOfferStatusPublished()
    {
        $offer = $this->createOffer();

        $this->jobOfferService->updateStatus($offer, 'publish');

        $secondOffer = $this->createOffer();

        $this->assertEquals(JobOffer::STATUS_PUBLISHED, $secondOffer->status);
    }

    private function createOffer()
    {
        $data = [
            'email' => 'test@test.com',
            'title' => 'New Job Offer',
            'description' => 'Lorem ipsum dolor sit amet'
        ];

        return $this->jobOfferService->create($data);
    }
}
