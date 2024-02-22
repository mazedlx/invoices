<?php

namespace Database\Seeders;

use App\Customer;
use App\Invoice;
use App\Line;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Customer::factory()->has(
            Invoice::factory()->has(
                Line::factory()->count(3)
            )->count(3)
        )->count(50)->create();
    }
}
