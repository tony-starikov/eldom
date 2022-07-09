<?php

use App\Category;
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
        Category::create([
            'id' => 1,
            'name' => 'Трехфазные счетчики',
            'slug' => 'trehfaznye-schetchiki',
        ]);

        Category::create([
            'id' => 2,
            'name' => 'Однофазные счетчики',
            'slug' => 'odnofaznye-schetchiki',
        ]);

        Category::create([
            'id' => 3,
            'name' => 'Релейное оборудование',
            'slug' => 'relejnoe-oborudovanie',
        ]);

        Category::create([
            'id' => 4,
            'name' => 'Модульное оборудование',
            'slug' => 'modulnoe-oborudovanie',
        ]);

        Category::create([
            'id' => 5,
            'name' => 'Шкафы и боксы',
            'slug' => 'shkafy-i-boksy',
        ]);

        Category::create([
            'id' => 6,
            'name' => 'Кабель и провода',
            'slug' => 'kabel-i-provoda',
        ]);

        Category::create([
            'id' => 7,
            'name' => 'Для прокладки кабеля',
            'slug' => 'dlya-prokladki-kabelya',
        ]);

        Category::create([
            'id' => 8,
            'name' => 'Светотехнические изделия',
            'slug' => 'svetotekhnicheskie-izdeliya',
        ]);

        Category::create([
            'id' => 9,
            'name' => 'Силовое оборудование',
            'slug' => 'silovoe-oborudovanie',
        ]);
    }
}
