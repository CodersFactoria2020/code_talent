<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Candidate;
use Faker\Generator as Faker;

$factory->define(Candidate::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName(),
        'lastname' => $faker->lastName(),
        'email' => $faker->unique()->safeEmail(),
        'phone_number' => $faker->phoneNumber(),
        'promotion_id' => $faker->numberBetween(1,3),
        'status' => $faker->numberBetween(0,100),
        'sololearn' => $faker->url(),
        'codeacademy' => $faker->url(),
         ];
});
