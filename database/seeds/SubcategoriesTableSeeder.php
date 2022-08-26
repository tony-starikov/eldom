<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'name_ru' => 'Счетчики энергомера',
                'name_ua' => 'Лічильники енергомєра',
                'slug' => 'schjotchiki-jenergomera',
            ],
            [
                'id' => 2,
                'category_id' => 1,
                'name_ru' => 'Счетчики меркурий',
                'name_ua' => 'Лічильники меркурій',
                'slug' => 'schjotchiki-merkurij',
            ],
            [
                'id' => 3,
                'category_id' => 1,
                'name_ru' => 'Счетчики NIK',
                'name_ua' => 'Лічильники NIK',
                'slug' => 'schjotchiki-nik',
            ],
            [
                'id' => 4,
                'category_id' => 1,
                'name_ru' => 'Счетчики Tele Tec',
                'name_ua' => 'Лічильники Tele Tec',
                'slug' => 'schjotchiki-tele-tec',
            ],
            [
                'id' => 5,
                'category_id' => 1,
                'name_ru' => 'Трансформаторы',
                'name_ua' => 'Трансформатори',
                'slug' => 'transformatory',
            ],



            [
                'id' => 6,
                'category_id' => 2,
                'name_ru' => 'Счетчики энергомера',
                'name_ua' => 'Лічильники енергомєра',
                'slug' => 'schjotchiki-jenergomera-odnofaznye',
            ],
            [
                'id' => 7,
                'category_id' => 2,
                'name_ru' => 'Счетчики меркурий',
                'name_ua' => 'Лічильники меркурій',
                'slug' => 'schjotchiki-merkurij-odnofaznye',
            ],
            [
                'id' => 8,
                'category_id' => 2,
                'name_ru' => 'Счетчики NIK',
                'name_ua' => 'Лічильники NIK',
                'slug' => 'schjotchiki-nik-odnofaznye',
            ],
            [
                'id' => 9,
                'category_id' => 2,
                'name_ru' => 'Счетчики Tele Tec',
                'name_ua' => 'Лічильники Tele Tec',
                'slug' => 'schetchiki-tele-tec-odnofaznye',
            ],
            [
                'id' => 10,
                'category_id' => 2,
                'name_ru' => 'Колодка NIK',
                'name_ua' => 'Колодка NIK',
                'slug' => 'kommunikacionnaja-kolodka',
            ],


            [
                'id' => 11,
                'category_id' => 3,
                'name_ru' => 'Датчики движения',
                'name_ua' => 'Датчики руху',
                'slug' => 'datchiki-dvizheniya',
            ],
            [
                'id' => 12,
                'category_id' => 3,
                'name_ru' => 'Переключатели фаз',
                'name_ua' => 'Перемикачі фаз',
                'slug' => 'pereklyuchateli-faz',
            ],
            [
                'id' => 13,
                'category_id' => 3,
                'name_ru' => 'Реле контроля фаз',
                'name_ua' => 'Реле контролю фаз',
                'slug' => 'rele-kontrolya-faz',
            ],
            [
                'id' => 14,
                'category_id' => 3,
                'name_ru' => 'Реле напряжения',
                'name_ua' => 'Реле напруги',
                'slug' => 're-le-naprjazhenija',
            ],
            [
                'id' => 15,
                'category_id' => 3,
                'name_ru' => 'Таймеры',
                'name_ua' => 'Таймери',
                'slug' => 'tajmery',
            ],


            [
                'id' => 16,
                'category_id' => 4,
                'name_ru' => 'Рубильники',
                'name_ua' => 'Рубильники',
                'slug' => 'rubilniki',
            ],
            [
                'id' => 17,
                'category_id' => 4,
                'name_ru' => 'Автоматы',
                'name_ua' => 'Автомати',
                'slug' => 'avtomaty',
            ],
            [
                'id' => 18,
                'category_id' => 4,
                'name_ru' => 'УЗО и дифреле',
                'name_ua' => 'ПЗВ та дифреле',
                'slug' => 'uzo-i-difrele',
            ],
            [
                'id' => 19,
                'category_id' => 4,
                'name_ru' => 'Стабилизаторы',
                'name_ua' => 'Стабілізатори',
                'slug' => 'stabilizatory',
            ],


            [
                'id' => 20,
                'category_id' => 5,
                'name_ru' => 'Корпуса щитов учета',
                'name_ua' => 'Корпуси щитів обліку',
                'slug' => 'korpusa-shchitov-ucheta',
            ],
            [
                'id' => 21,
                'category_id' => 5,
                'name_ru' => 'Корпуса пластиковые',
                'name_ua' => 'Корпуси пластикові',
                'slug' => 'korpusa-plastikovye',
            ],
            [
                'id' => 22,
                'category_id' => 5,
                'name_ru' => 'Корпуса металлические',
                'name_ua' => 'Корпуси металеві',
                'slug' => 'korpusa-metallicheskie',
            ],
            [
                'id' => 23,
                'category_id' => 5,
                'name_ru' => 'Щит с монтажной панелью',
                'name_ua' => 'Щит із монтажною панеллю',
                'slug' => 'shchit-s-montazhnoj-panelyu',
            ],
            [
                'id' => 24,
                'category_id' => 5,
                'name_ru' => 'Щит этажный',
                'name_ua' => 'Щит поверховий',
                'slug' => 'shchit-etazhnyj',
            ],


            [
                'id' => 25,
                'category_id' => 6,
                'name_ru' => 'Кабель и провод соеденительный',
                'name_ua' => 'Кабель та провід з\'єднувальний',
                'slug' => 'kabel-i-provod-soedenitelnyj',
            ],
            [
                'id' => 26,
                'category_id' => 6,
                'name_ru' => 'Кабель для связи',
                'name_ua' => 'Кабель для зв\'язку',
                'slug' => 'kabel-dlya-svyazi',
            ],
            [
                'id' => 27,
                'category_id' => 6,
                'name_ru' => 'Наконечники кабельные',
                'name_ua' => 'Наконечники кабельні',
                'slug' => 'nakonechniki-kabelnye',
            ],
            [
                'id' => 28,
                'category_id' => 6,
                'name_ru' => 'Сип и линейная арматура',
                'name_ua' => 'Сіп та лінійна арматура',
                'slug' => 'sip-i-linejnaya-armatura',
            ],
            [
                'id' => 29,
                'category_id' => 6,
                'name_ru' => 'Сип - 4 и кабель',
                'name_ua' => 'Сіп - 4 та кабель',
                'slug' => 'sip-4-i-kabel',
            ],
            [
                'id' => 30,
                'category_id' => 6,
                'name_ru' => 'Инструмент',
                'name_ua' => 'Інструмент',
                'slug' => 'instrument',
            ],


            [
                'id' => 31,
                'category_id' => 7,
                'name_ru' => 'Металлические лотки',
                'name_ua' => 'Металеві лотки',
                'slug' => 'metallicheskie-lotki',
            ],
            [
                'id' => 32,
                'category_id' => 7,
                'name_ru' => 'Кабельные каналы',
                'name_ua' => 'Кабельні канали',
                'slug' => 'kabelnye-kanaly',
            ],
            [
                'id' => 33,
                'category_id' => 7,
                'name_ru' => 'Гофрированные трубы',
                'name_ua' => 'Гофровані труби',
                'slug' => 'gofrirovannye-truby',
            ],
            [
                'id' => 34,
                'category_id' => 7,
                'name_ru' => 'Металлический рукав',
                'name_ua' => 'Металевий рукав',
                'slug' => 'metallicheskij-rukav',
            ],
            [
                'id' => 35,
                'category_id' => 7,
                'name_ru' => 'Труба жёсткая ПВХ',
                'name_ua' => 'Труба жорстка ПВХ',
                'slug' => 'truba-zhestkaya-pvkh',
            ],


            [
                'id' => 36,
                'category_id' => 8,
                'name_ru' => 'Светильники НПП IP 54',
                'name_ua' => 'Світильники НВП IP 54',
                'slug' => 'svetilniki-npp-ip-54',
            ],
            [
                'id' => 37,
                'category_id' => 8,
                'name_ru' => 'Светильники ЛПО',
                'name_ua' => 'Світильники ЛПО',
                'slug' => 'svetilniki-lpo',
            ],
            [
                'id' => 38,
                'category_id' => 8,
                'name_ru' => 'Светильники ЛСП IP 65',
                'name_ua' => 'Світильники ЛСП IP 65',
                'slug' => 'svetilniki-lsp-ip-65',
            ],
            [
                'id' => 39,
                'category_id' => 8,
                'name_ru' => 'Светильники ЛБА',
                'name_ua' => 'Світильники ЛБА',
                'slug' => 'svetilniki-lba',
            ],
            [
                'id' => 40,
                'category_id' => 8,
                'name_ru' => 'Прожектора',
                'name_ua' => 'Прожектора',
                'slug' => 'prozhektora',
            ],


            [
                'id' => 41,
                'category_id' => 9,
                'name_ru' => 'Силовые автоматы ВА 88',
                'name_ua' => 'Силові автомати ВА 88',
                'slug' => 'silovye-avtomaty-va-88',
            ],
            [
                'id' => 42,
                'category_id' => 9,
                'name_ru' => 'Контакторы КМИ',
                'name_ua' => 'Контактори КМІ',
                'slug' => 'kontaktory-kmi',
            ],
            [
                'id' => 43,
                'category_id' => 9,
                'name_ru' => 'Контакторы КМИ в защитной оболочке',
                'name_ua' => 'Контактори КМІ у захисній оболонці',
                'slug' => 'kontaktory-kmi-v-zashchitnoj-obolochke',
            ],
            [
                'id' => 44,
                'category_id' => 9,
                'name_ru' => 'Контактор электромагнитный',
                'name_ua' => 'Контактор електромагнітний',
                'slug' => 'kontaktor-elektromagnitnyj',
            ],
            [
                'id' => 45,
                'category_id' => 9,
                'name_ru' => 'Устройство защиты двигателя ПРК',
                'name_ua' => 'Пристрій захисту двигуна ПРК',
                'slug' => 'ustrojstvo-zashchity-dvigatelya-prk',
            ],
            [
                'id' => 46,
                'category_id' => 9,
                'name_ru' => 'Контакторы модульные',
                'name_ua' => 'Контактори модульні',
                'slug' => 'kontaktory-modulnye',
            ],

        ]);

        if (env('DB_CONNECTION') == 'pgsql'){

            DB::statement("SELECT setval(pg_get_serial_sequence('subcategories', 'id'), max(id)) FROM subcategories");

        }
    }
}
