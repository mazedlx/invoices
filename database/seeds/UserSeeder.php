<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'name' => 'Bob Doe',
            'email' => 'mazedlx@gmail.com',
            'password' => bcrypt('test'),
        ]);
    }
}
