<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'doctor',
            'email' => 'doctor@gmail.com',
            'password' => bcrypt('secret'),
        ]);
        // $this->call(UsersTableSeeder::class);
    }
}
