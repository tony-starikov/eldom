<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([
            [
                'id' => 1,
                'name' => 'main',
                'title' => 'main | Company',
                'description' => 'Main page'
            ],
            [
                'id' => 2,
                'name' => 'delivery',
                'title' => 'Доставка и оплата',
                'description' => 'Main page'
            ],
            [
                'id' => 3,
                'name' => 'contacts',
                'title' => 'Контакты',
                'description' => 'Main page'
            ],
        ]);

        if (env('DB_CONNECTION') == 'pgsql'){

            DB::statement("SELECT setval(pg_get_serial_sequence('pages', 'id'), max(id)) FROM pages");

        }
    }
}
