<?php

use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status')->insert([
            'name' => 'cart',
        ]);

        DB::table('status')->insert([
            'name' => 'checkout',
        ]);

        DB::table('status')->insert([
            'name' => 'late',
        ]);

        DB::table('status')->insert([
            'name' => 'cancel',
        ]);
    }
}
