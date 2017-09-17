<?php

use Faker\Generator as Faker;

$factory->define(App\Invoice::class, function (Faker $faker) {
    return [
        'address' => $faker->streetName,
        'city' => $faker->city,
        'customer_id' => function () {
            return factory(App\Customer::class)->create()->id;
        },
        'company_id' => function () {
            return factory(App\Company::class)->create()->id;
        },
        'country' => $faker->country,
        'date' => $faker->date('Y-m-d'),
        'number' => $faker->randomNumber,
        'paid' => $faker->boolean,
        'zip' => $faker->postcode,
    ];
});

