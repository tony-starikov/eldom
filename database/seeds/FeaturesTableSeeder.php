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

//            Трансформаторы тока Т-0,66 200/5 0,5S
            [
                'product_id' => 8,
                'feature' => 'Номинальное напряжение трансформатора 0,66 кВ',
            ],
            [
                'product_id' => 8,
                'feature' => 'Номинальная первичная сила тока трансформатора 200 А',
            ],
            [
                'product_id' => 8,
                'feature' => 'Номинальная вторичная сила тока трансформатора 5 А',
            ],
            [
                'product_id' => 8,
                'feature' => 'Номинальная частота напряжения в сети 50 Гц/60 Гц',
            ],
            [
                'product_id' => 8,
                'feature' => 'Номинальная вторичная нагрузка при коэффициенте cos ? = 0,8 5 ВА',
            ],
            [
                'product_id' => 8,
                'feature' => 'Класс точности 0,5S',
            ],
            [
                'product_id' => 8,
                'feature' => 'Межповерочный интервал 4 года',
            ],
            [
                'product_id' => 8,
                'feature' => 'Масса, не более 0,9 кг',
            ],
        ]);

        if (env('DB_CONNECTION') == 'pgsql'){

            DB::statement("SELECT setval(pg_get_serial_sequence('features', 'id'), max(id)) FROM features");

        }
    }
}
