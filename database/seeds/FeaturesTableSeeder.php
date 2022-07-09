<?php

use Illuminate\Database\Seeder;

class FeaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('features')->insert([
            [
                'product_id' => 1,
                'feature' => 'Средняя наработка на отказ — 160 000 часов',
            ],

            [
                'product_id' => 1,
                'feature' => 'Межповерочный интервал — 16 лет',
            ],

            [
                'product_id' => 1,
                'feature' => 'Средний срок службы — 30 лет',
            ],

            [
                'product_id' => 1,
                'feature' => 'Класс точности 1,0',
            ],

            [
                'product_id' => 1,
                'feature' => 'Число тарифов 1',
            ],

            [
                'product_id' => 1,
                'feature' => 'Частота измерительной сети, Гц 50±2,5 (60±3)',
            ],

            [
                'product_id' => 1,
                'feature' => 'Номинальное фазное напряжение*, В 220',
            ],

            [
                'product_id' => 1,
                'feature' => 'Номинальная сила тока*, А 60',
            ],

            [
                'product_id' => 1,
                'feature' => 'Максимальная сила тока*, А 100',
            ],

            [
                'product_id' => 1,
                'feature' => 'Полная потребляемая мощность параллельной цепи, не более, В*А, (Вт) 6(0,6)',
            ],

            [
                'product_id' => 1,
                'feature' => 'Полная потребляемая мощность последовательной цепи, не более, В*А 0,1',
            ],

            [
                'product_id' => 1,
                'feature' => 'Диапазон рабочих температур, °С от -40 до 60',
            ],

            [
                'product_id' => 1,
                'feature' => 'Габаритные размеры, мм 143 x 170 x 52',
            ],
        ]);

        if (env('DB_CONNECTION') == 'pgsql'){

            DB::statement("SELECT setval(pg_get_serial_sequence('features', 'id'), max(id)) FROM features");

        }
    }
}
