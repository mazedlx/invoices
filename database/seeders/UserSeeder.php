<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'email' => 'mazedlx@gmail.com',
            'password' => bcrypt('test'),
        ]); 
    }
}
