<?php

use Illuminate\Database\Seeder;

class DefaultWinningNumber extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $winning_numbers = [
            ['member_id' => '1', 'value' => '2839'],
            ['member_id' => '1', 'value' => '2993'],
            ['member_id' => '1', 'value' => '9931'],
            ['member_id' => '1', 'value' => '0932'],
            ['member_id' => '1', 'value' => '9322'],
            ['member_id' => '2', 'value' => '1234'],
            ['member_id' => '2', 'value' => '3404'],
            ['member_id' => '3', 'value' => '5678'],
            ['member_id' => '3', 'value' => '3939'],
            ['member_id' => '4', 'value' => '9012'],
            ['member_id' => '4', 'value' => '3838'],
            ['member_id' => '4', 'value' => '4738'],
            ['member_id' => '5', 'value' => '0000'],
            ['member_id' => '6', 'value' => '3748'],
            ['member_id' => '6', 'value' => '9393'],
            ['member_id' => '6', 'value' => '3782'],
            ['member_id' => '6', 'value' => '8301'],
            ['member_id' => '6', 'value' => '0138'],
        ];

        DB::table('winning_numbers')->insert($winning_numbers);
    }
}
