<?php

namespace Database\Factories;

use App\invoice;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = invoice::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'address' => $this->faker->streetName,
            'city' => $this->faker->city,
            'country' => $this->faker->country,
            'date' => $this->faker->date('Y-m-d'),
            'number' => $this->faker->unique()->randomNumber,
            'paid' => $this->faker->boolean,
            'zip' => $this->faker->postcode,
        ];
    }
}
