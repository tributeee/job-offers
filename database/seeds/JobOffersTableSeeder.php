<?php

use Illuminate\Database\Seeder;

class JobOffersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\JobOffer::unguard();

        \Illuminate\Support\Facades\DB::table('job_offers')->delete();

        $faker = Faker\Factory::create();

        for ($i = 0; $i < 30; $i++) {
            $offer = new \App\JobOffer();
            $offer->email = $faker->email;
            $offer->title = $faker->jobTitle;
            $offer->description = $faker->text();
            $offer->status = rand(1, 3);
            $offer->save();
        }
    }
}
