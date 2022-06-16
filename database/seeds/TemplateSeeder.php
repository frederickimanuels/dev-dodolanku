<?php

use Illuminate\Database\Seeder;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('templates')->insert([
            'name' => 'Fashion Elegant',
            'code' => 'fashion-1'
        ]);

        DB::table('template_stores')->insert([
            'store_id' => '1',
            'template_id' => '1'
        ]);
    }
}
