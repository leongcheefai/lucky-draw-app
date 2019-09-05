<?php

use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $members = [
            ['name' => 'John'],
            ['name' => 'Carol'],
            ['name' => 'Kenny'],
            ['name' => 'Jason'],
            ['name' => 'Sean'],
            ['name' => 'Lisa'],
        ];

        DB::table('members')->insert($members);
    }
}
