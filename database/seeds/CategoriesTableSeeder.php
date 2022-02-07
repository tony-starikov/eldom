<?php

use Illuminate\Database\Seeder;

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
                'name' => 'Трехфазные счетчики',
                'slug' => 'trehfaznye-schetchiki',
            ],
            [
                'name' => 'Однофазные счетчики',
                'slug' => 'odnofaznye-schetchiki',
            ],
            [
                'name' => 'Релейное оборудование',
                'slug' => 'relejnoe-oborudovanie',
            ],
            [
                'name' => 'Модульное оборудование',
                'slug' => 'modulnoe-oborudovanie',
            ],
            [
                'name' => 'Шкафы и боксы',
                'slug' => 'shkafy-i-boksy',
            ],
            [
                'name' => 'Кабель и провода',
                'slug' => 'kabel-i-provoda',
            ],
            [
                'name' => 'Для прокладки кабеля',
                'slug' => 'dlya-prokladki-kabelya',
            ],
            [
                'name' => 'Светотехнические изделия',
                'slug' => 'svetotekhnicheskie-izdeliya',
            ],
            [
                'name' => 'Силовое оборудование',
                'slug' => 'silovoe-oborudovanie',
            ],
        ]);
    }
}
