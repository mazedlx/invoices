<?php

use Faker\Generator as Faker;

$factory->define(App\Line::class, function (Faker $faker) {
    return [
        'invoice_id' => function () {
            return factory(App\Invoice::class)->create()->id;
        },
        'rate' => 9000,
        'time' => $faker->randomNumber(2),
        'task' => $faker->sentence,
    ];
});
