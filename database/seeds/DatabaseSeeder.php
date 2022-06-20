<?php

use App\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(TemplateSeeder::class);
        $this->call(BannedSeeder::class);
        $this->call(CategorySeeder::class);
    }
}
