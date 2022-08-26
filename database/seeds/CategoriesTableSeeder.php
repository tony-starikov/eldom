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
                'name_ru' => 'Трехфазные счетчики',
                'name_ua' => 'Трифазні лічильники',
                'slug' => 'trehfaznye-schetchiki',
            ],
            [
                'id' => 2,
                'name_ru' => 'Однофазные счетчики',
                'name_ua' => 'Однофазні лічильники',
                'slug' => 'odnofaznye-schetchiki',
            ],
            [
                'id' => 3,
                'name_ru' => 'Релейное оборудование',
                'name_ua' => 'Релейне обладнання',
                'slug' => 'relejnoe-oborudovanie',
            ],
            [
                'id' => 4,
                'name_ru' => 'Модульное оборудование',
                'name_ua' => 'Модульне обладнання',
                'slug' => 'modulnoe-oborudovanie',
            ],
            [
                'id' => 5,
                'name_ru' => 'Шкафы и боксы',
                'name_ua' => 'Шафи та бокси',
                'slug' => 'shkafy-i-boksy',
            ],
            [
                'id' => 6,
                'name_ru' => 'Кабель и провода',
                'name_ua' => 'Кабель та дроти',
                'slug' => 'kabel-i-provoda',
            ],
            [
                'id' => 7,
                'name_ru' => 'Для прокладки кабеля',
                'name_ua' => 'Для прокладання кабелю',
                'slug' => 'dlya-prokladki-kabelya',
            ],
            [
                'id' => 8,
                'name_ru' => 'Светотехнические изделия',
                'name_ua' => 'Світлотехнічні вироби',
                'slug' => 'svetotekhnicheskie-izdeliya',
            ],
            [
                'id' => 9,
                'name_ru' => 'Силовое оборудование',
                'name_ua' => 'Силове обладнання',
                'slug' => 'silovoe-oborudovanie',
            ],
        ]);

        if (env('DB_CONNECTION') == 'pgsql'){

            DB::statement("SELECT setval(pg_get_serial_sequence('categories', 'id'), max(id)) FROM categories");

        }
    }
}
