<?php

use Faker\Generator as Faker;

$factory->define(\App\JobOffer::class, function (Faker $faker) {
    return [
        'email' => $faker->email,
        'title' => $faker->sentence,
        'description' => $faker->text
    ];
});
