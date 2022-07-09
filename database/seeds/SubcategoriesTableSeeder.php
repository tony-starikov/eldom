<?php

use Illuminate\Database\Seeder;

class SubcategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subcategories')->insert([
            [
                'id' => 1,
                'category_id' => 1,
                'name' => 'Счетчики энергомера',
                'slug' => 'schjotchiki-jenergomera',
            ],
            [
                'id' => 2,
                'category_id' => 1,
                'name' => 'Счетчики меркурий',
                'slug' => 'schjotchiki-merkurij',
            ],
            [
                'id' => 3,
                'category_id' => 1,
                'name' => 'Счетчики NIK',
                'slug' => 'schjotchiki-nik',
            ],
            [
                'id' => 4,
                'category_id' => 1,
                'name' => 'Счетчики Tele Tec',
                'slug' => 'schjotchiki-tele-tec',
            ],
            [
                'id' => 5,
                'category_id' => 1,
                'name' => 'Трансформаторы',
                'slug' => 'transformatory',
            ],



            [
                'id' => 6,
                'category_id' => 2,
                'name' => 'Счетчики энергомера',
                'slug' => 'schjotchiki-jenergomera-odnofaznye',
            ],
            [
                'id' => 7,
                'category_id' => 2,
                'name' => 'Счетчики меркурий',
                'slug' => 'schjotchiki-merkurij-odnofaznye',
            ],
            [
                'id' => 8,
                'category_id' => 2,
                'name' => 'Счетчики NIK',
                'slug' => 'schjotchiki-nik-odnofaznye',
            ],
            [
                'id' => 9,
                'category_id' => 2,
                'name' => 'Счетчики Tele Tec',
                'slug' => 'schetchiki-tele-tec-odnofaznye',
            ],
            [
                'id' => 10,
                'category_id' => 2,
                'name' => 'Колодка NIK',
                'slug' => 'kommunikacionnaja-kolodka',
            ],





            [
                'id' => 11,
                'category_id' => 3,
                'name' => 'Датчики движения',
                'slug' => 'datchiki-dvizheniya',
            ],
            [
                'id' => 12,
                'category_id' => 3,
                'name' => 'Переключатели фаз',
                'slug' => 'pereklyuchateli-faz',
            ],
            [
                'id' => 13,
                'category_id' => 3,
                'name' => 'Реле контроля фаз',
                'slug' => 'rele-kontrolya-faz',
            ],
            [
                'id' => 14,
                'category_id' => 3,
                'name' => 'Реле напряжения',
                'slug' => 're-le-naprjazhenija',
            ],
            [
                'id' => 15,
                'category_id' => 3,
                'name' => 'Таймеры',
                'slug' => 'tajmery',
            ],




            [
                'id' => 16,
                'category_id' => 4,
                'name' => 'Рубильники',
                'slug' => 'rubilniki',
            ],
            [
                'id' => 17,
                'category_id' => 4,
                'name' => 'Автоматы',
                'slug' => 'avtomaty',
            ],
            [
                'id' => 18,
                'category_id' => 4,
                'name' => 'УЗО и дифреле',
                'slug' => 'uzo-i-difrele',
            ],
            [
                'id' => 19,
                'category_id' => 4,
                'name' => 'Стабилизаторы',
                'slug' => 'stabilizatory',
            ],




            [
                'id' => 20,
                'category_id' => 5,
                'name' => 'Корпуса щитов учета',
                'slug' => 'korpusa-shchitov-ucheta',
            ],
            [
                'id' => 21,
                'category_id' => 5,
                'name' => 'Корпуса пластиковые',
                'slug' => 'korpusa-plastikovye',
            ],
            [
                'id' => 22,
                'category_id' => 5,
                'name' => 'Корпуса металлические',
                'slug' => 'korpusa-metallicheskie',
            ],
            [
                'id' => 23,
                'category_id' => 5,
                'name' => 'Щит с монтажной панелью',
                'slug' => 'shchit-s-montazhnoj-panelyu',
            ],
            [
                'id' => 24,
                'category_id' => 5,
                'name' => 'Щит этажный',
                'slug' => 'shchit-etazhnyj',
            ],




            [
                'id' => 25,
                'category_id' => 6,
                'name' => 'Кабель и провод соеденительный',
                'slug' => 'kabel-i-provod-soedenitelnyj',
            ],
            [
                'id' => 26,
                'category_id' => 6,
                'name' => 'Кабель для связи',
                'slug' => 'kabel-dlya-svyazi',
            ],
            [
                'id' => 27,
                'category_id' => 6,
                'name' => 'Наконечники кабельные',
                'slug' => 'nakonechniki-kabelnye',
            ],
            [
                'id' => 28,
                'category_id' => 6,
                'name' => 'Сип и линейная арматура',
                'slug' => 'sip-i-linejnaya-armatura',
            ],
            [
                'id' => 29,
                'category_id' => 6,
                'name' => 'Сип - 4 и кабель',
                'slug' => 'sip-4-i-kabel',
            ],
            [
                'id' => 30,
                'category_id' => 6,
                'name' => 'Инструмент',
                'slug' => 'instrument',
            ],




            [
                'id' => 31,
                'category_id' => 7,
                'name' => 'Металлические лотки',
                'slug' => 'metallicheskie-lotki',
            ],
            [
                'id' => 32,
                'category_id' => 7,
                'name' => 'Кабельные каналы',
                'slug' => 'kabelnye-kanaly',
            ],
            [
                'id' => 33,
                'category_id' => 7,
                'name' => 'Гофрированные трубы',
                'slug' => 'gofrirovannye-truby',
            ],
            [
                'id' => 34,
                'category_id' => 7,
                'name' => 'Металлический рукав',
                'slug' => 'metallicheskij-rukav',
            ],
            [
                'id' => 35,
                'category_id' => 7,
                'name' => 'Труба жёсткая ПВХ',
                'slug' => 'truba-zhestkaya-pvkh',
            ],




            [
                'id' => 36,
                'category_id' => 8,
                'name' => 'Светильники НПП IP 54',
                'slug' => 'svetilniki-npp-ip-54',
            ],
            [
                'id' => 37,
                'category_id' => 8,
                'name' => 'Светильники ЛПО',
                'slug' => 'svetilniki-lpo',
            ],
            [
                'id' => 38,
                'category_id' => 8,
                'name' => 'Светильники ЛСП IP 65',
                'slug' => 'svetilniki-lsp-ip-65',
            ],
            [
                'id' => 39,
                'category_id' => 8,
                'name' => 'Светильники ЛБА',
                'slug' => 'svetilniki-lba',
            ],
            [
                'id' => 40,
                'category_id' => 8,
                'name' => 'Прожектора',
                'slug' => 'prozhektora',
            ],




            [
                'id' => 41,
                'category_id' => 9,
                'name' => 'Силовые автоматы ВА 88',
                'slug' => 'silovye-avtomaty-va-88',
            ],
            [
                'id' => 42,
                'category_id' => 9,
                'name' => 'Контакторы КМИ',
                'slug' => 'kontaktory-kmi',
            ],
            [
                'id' => 43,
                'category_id' => 9,
                'name' => 'Контакторы КМИ в защитной оболочке',
                'slug' => 'kontaktory-kmi-v-zashchitnoj-obolochke',
            ],
            [
                'id' => 44,
                'category_id' => 9,
                'name' => 'Контактор электромагнитный',
                'slug' => 'kontaktor-elektromagnitnyj',
            ],
            [
                'id' => 45,
                'category_id' => 9,
                'name' => 'Устройство защиты двигателя ПРК',
                'slug' => 'ustrojstvo-zashchity-dvigatelya-prk',
            ],
            [
                'id' => 46,
                'category_id' => 9,
                'name' => 'Контакторы модульные',
                'slug' => 'kontaktory-modulnye',
            ],

        ]);

        if (env('DB_CONNECTION') == 'pgsql'){

            DB::statement("SELECT setval(pg_get_serial_sequence('subcategories', 'id'), max(id)) FROM subcategories");

        }
    }
}
