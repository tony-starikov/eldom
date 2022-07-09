<?php

use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'id' => 1,
                'name' => 'Трехфазные счетчики',
                'slug' => 'trehfaznye-schetchiki',
            ],
            [
                'id' => 2,
                'name' => 'Однофазные счетчики',
                'slug' => 'odnofaznye-schetchiki',
            ],
            [
                'id' => 3,
                'name' => 'Релейное оборудование',
                'slug' => 'relejnoe-oborudovanie',
            ],
            [
                'id' => 4,
                'name' => 'Модульное оборудование',
                'slug' => 'modulnoe-oborudovanie',
            ],
            [
                'id' => 5,
                'name' => 'Шкафы и боксы',
                'slug' => 'shkafy-i-boksy',
            ],
            [
                'id' => 6,
                'name' => 'Кабель и провода',
                'slug' => 'kabel-i-provoda',
            ],
            [
                'id' => 7,
                'name' => 'Для прокладки кабеля',
                'slug' => 'dlya-prokladki-kabelya',
            ],
            [
                'id' => 8,
                'name' => 'Светотехнические изделия',
                'slug' => 'svetotekhnicheskie-izdeliya',
            ],
            [
                'id' => 9,
                'name' => 'Силовое оборудование',
                'slug' => 'silovoe-oborudovanie',
            ],
        ]);

        if (env('DB_CONNECTION') == 'pgsql'){

            DB::statement("SELECT setval(pg_get_serial_sequence('categories', 'id'), max(id)) FROM categories");

        }
    }
}
