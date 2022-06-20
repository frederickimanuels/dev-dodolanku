<?php

use Illuminate\Database\Seeder;

class BannedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banned')->insert([
            'name' => 'banned',
        ]);
    }
}
