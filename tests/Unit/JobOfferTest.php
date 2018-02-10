<?php

namespace Tests\Unit;

use App\JobOffer;
use App\Services\JobOfferService;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JobOfferTest extends TestCase
{
    use RefreshDatabase;

    protected $jobOfferService;

    public function setUp()
    {
        parent::setUp();

        $this->jobOfferService = new JobOfferService();
    }

    public function testCreatePendingJobOffer()
    {
        $offer = $this->createOffer();

        $this->assertEquals(JobOffer::STATUS_PENDING, $offer->status);
    }

    public function testJobOfferChangeStatusToPublished()
    {
        $offer = $this->createOffer();

        $this->jobOfferService->updateStatus($offer, 'publish');

        $this->assertEquals(JobOffer::STATUS_PUBLISHED, $offer->status);
    }

    public function testJobOfferChangeStatusToSpam()
    {
        $offer = $this->createOffer();

        $this->jobOfferService->updateStatus($offer, 'mark-spam');

        $this->assertEquals(JobOffer::STATUS_SPAM, $offer->status);
    }

    public function testSecondJobOfferStatusPublished()
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
