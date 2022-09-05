<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RequisitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('requisites')->insert([
            [
                'id' => 1,
                'code' => '3202708814',
                'payment_account' => '26005054413464',
                'interbranch_turnover' => '328704',
                'recipient' => 'Акімов Денис Олексійович',
            ],
        ]);

        if (env('DB_CONNECTION') == 'pgsql'){

            DB::statement("SELECT setval(pg_get_serial_sequence('requisites', 'id'), max(id)) FROM requisites");

        }
    }
}
