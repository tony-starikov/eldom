<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('phones')->insert([
            [
                'id' => 1,
                'phone' => '+38 (094) 997-64-08',
                'main' => 1,
            ],
            [
                'id' => 2,
                'phone' => '+38 (067) 141-73-18',
                'main' => 0,
            ],
        ]);

        if (env('DB_CONNECTION') == 'pgsql'){

            DB::statement("SELECT setval(pg_get_serial_sequence('phones', 'id'), max(id)) FROM phones");

        }
    }
}
