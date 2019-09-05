<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = Hash::make('12345');
        $admin = ['name' => 'Admin', 'email' => 'admin@gmail.com', 'password' => $password];

        DB::table('users')->insert($admin);
    }
}
