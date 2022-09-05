<?php

use Database\Seeders\MessageTableSeeder;
use Database\Seeders\RequisitesTableSeeder;
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
        $this->call([
            PagesTableSeeder::class,
            UsersTableSeeder::class,
            CategoriesTableSeeder::class,
            SubcategoriesTableSeeder::class,
            ProductsTableSeeder::class,
            FeaturesTableSeeder::class,
            MessageTableSeeder::class,
            RequisitesTableSeeder::class,
        ]);
    }
}
