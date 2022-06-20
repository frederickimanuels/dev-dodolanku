<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Aksesoris',
        ]);

        DB::table('categories')->insert([
            'name' => 'Kaos',
        ]);

        DB::table('categories')->insert([
            'name' => 'Baju Tidur',
        ]);

        DB::table('categories')->insert([
            'name' => 'Kemeja',
        ]);

        DB::table('categories')->insert([
            'name' => 'Outerwear',
        ]);

        DB::table('categories')->insert([
            'name' => 'Celana',
        ]);
        DB::table('categories')->insert([
            'name' => 'Pakaian Dalam Pria',
        ]);
        DB::table('categories')->insert([
            'name' => 'Sepatu',
        ]);
        DB::table('categories')->insert([
            'name' => 'Tas',
        ]);
        DB::table('categories')->insert([
            'name' => 'Bikini',
        ]);
        DB::table('categories')->insert([
            'name' => 'Dress',
        ]);
        DB::table('categories')->insert([
            'name' => 'Rok',
        ]);

        DB::table('categories')->insert([
            'name' => 'Pakaian Dalam Wanita',
        ]);

        DB::table('categories')->insert([
            'name' => 'Outerwear',
        ]);
        
        DB::table('categories')->insert([
            'name' => 'Setelan',
        ]);
    }
}
