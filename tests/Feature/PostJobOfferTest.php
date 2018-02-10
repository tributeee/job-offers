<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class PostJobOfferTest extends TestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();

        $this->withExceptionHandling();
    }

    /** @test */
    public function itRequiresValidEmail()
    {
        $this->postJobOffer(['email' => 'test'])->assertSessionHasErrors('email');
    }

    /** @test */
    public function itRequiresTitle()
    {
        $this->postJobOffer(['title' => ''])->assertSessionHasErrors('title');
    }

    /** @test */
    public function itRequiresDescription()
    {
        $this->postJobOffer(['description' => ''])->assertSessionHasErrors('description');
    }

    private function postJobOffer($attributes = []) {
        $this->withExceptionHandling();

        return $this->post('/create', $this->validFields($attributes));
    }

    private function validFields($overrides = []) {
        return array_merge([
            'email' => 'test@test.com',
            'title' => 'Job Offer',
            'description' => 'Lorem ipsum dolor sit amet'
        ], $overrides);
    }
}
