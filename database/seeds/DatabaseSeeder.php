<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // $this->call(InvoicesSeeder::class);
        $this->call(LinesSeeder::class);
        $this->call(UserSeeder::class);
    }
}
