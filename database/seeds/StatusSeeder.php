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
            'name' => 'Diproses',
        ]);

        DB::table('status')->insert([
            'name' => 'Dibatalkan',
        ]);

        DB::table('status')->insert([
            'name' => 'Dikirim',
        ]);

        DB::table('status')->insert([
            'name' => 'Selesai',
        ]);
    }
}
