<?php

use Faker\Generator as Faker;

$factory->define(App\Invoice::class, function (Faker $faker) {
    return [
        'address' => $faker->streetName,
        'city' => $faker->city,
        'customer' => $faker->name,
        'company' => $faker->company,
        'country' => $faker->country,
        'date' => $faker->date('Y-m-d'),
        'number' => $faker->randomNumber,
        'paid' => $faker->boolean,
        'zip' => $faker->postcode,
    ];
});

