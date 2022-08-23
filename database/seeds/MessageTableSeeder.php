<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->insert([
            [
                'id' => 1,
                'message_ua' => 'Сайт працює у тестовому режимі',
                'message_ru' => 'Сайт работает в тестовом режиме',
            ],
        ]);

        if (env('DB_CONNECTION') == 'pgsql'){

            DB::statement("SELECT setval(pg_get_serial_sequence('messages', 'id'), max(id)) FROM messages");

        }
    }
}
