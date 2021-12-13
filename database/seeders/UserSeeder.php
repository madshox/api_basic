<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'firstname' => 'admin',
            'lastname' => 'super',
            'phone' => '1234567',
            'email' => 'test@test.com',
            'password' => bcrypt('password'),
            'status' => '1',
        ]);
    }
}
