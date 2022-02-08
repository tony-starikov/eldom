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
                'category_id' => 1,
                'name' => 'Счетчики энергомера',
                'slug' => 'schjotchiki-jenergomera',
            ],
            [
                'category_id' => 1,
                'name' => 'Счетчики меркурий',
                'slug' => 'schjotchiki-merkurij',
            ],
            [
                'category_id' => 1,
                'name' => 'Счетчики NIK',
                'slug' => 'schjotchiki-nik',
            ],
            [
                'category_id' => 1,
                'name' => 'Счетчики Tele Tec',
                'slug' => 'schjotchiki-tele-tec',
            ],
            [
                'category_id' => 1,
                'name' => 'Трансформаторы',
                'slug' => 'transformatory',
            ],



            [
                'category_id' => 2,
                'name' => 'Счетчики энергомера',
                'slug' => 'schjotchiki-jenergomera-odnofaznye',
            ],
            [
                'category_id' => 2,
                'name' => 'Счетчики меркурий',
                'slug' => 'schjotchiki-merkurij-odnofaznye',
            ],
            [
                'category_id' => 2,
                'name' => 'Счетчики NIK',
                'slug' => 'schjotchiki-nik-odnofaznye',
            ],
            [
                'category_id' => 2,
                'name' => 'Счетчики Tele Tec',
                'slug' => 'schetchiki-tele-tec-odnofaznye',
            ],
            [
                'category_id' => 2,
                'name' => 'Колодка NIK',
                'slug' => 'kommunikacionnaja-kolodka',
            ],





            [
                'category_id' => 3,
                'name' => 'Датчики движения',
                'slug' => 'datchiki-dvizheniya',
            ],
            [
                'category_id' => 3,
                'name' => 'Переключатели фаз',
                'slug' => 'pereklyuchateli-faz',
            ],
            [
                'category_id' => 3,
                'name' => 'Реле контроля фаз',
                'slug' => 'rele-kontrolya-faz',
            ],
            [
                'category_id' => 3,
                'name' => 'Реле напряжения',
                'slug' => 're-le-naprjazhenija',
            ],
            [
                'category_id' => 3,
                'name' => 'Таймеры',
                'slug' => 'tajmery',
            ],




            [
                'category_id' => 4,
                'name' => 'Рубильники',
                'slug' => 'rubilniki',
            ],
            [
                'category_id' => 4,
                'name' => 'Автоматы',
                'slug' => 'avtomaty',
            ],
            [
                'category_id' => 4,
                'name' => 'УЗО и дифреле',
                'slug' => 'uzo-i-difrele',
            ],
            [
                'category_id' => 4,
                'name' => 'Стабилизаторы',
                'slug' => 'stabilizatory',
            ],




            [
                'category_id' => 5,
                'name' => 'Корпуса щитов учета',
                'slug' => 'korpusa-shchitov-ucheta',
            ],
            [
                'category_id' => 5,
                'name' => 'Корпуса пластиковые',
                'slug' => 'korpusa-plastikovye',
            ],
            [
                'category_id' => 5,
                'name' => 'Корпуса металлические',
                'slug' => 'korpusa-metallicheskie',
            ],
            [
                'category_id' => 5,
                'name' => 'Щит с монтажной панелью',
                'slug' => 'shchit-s-montazhnoj-panelyu',
            ],
            [
                'category_id' => 5,
                'name' => 'Щит этажный',
                'slug' => 'shchit-etazhnyj',
            ],




            [
                'category_id' => 6,
                'name' => 'Кабель и провод соеденительный',
                'slug' => 'kabel-i-provod-soedenitelnyj',
            ],
            [
                'category_id' => 6,
                'name' => 'Кабель для связи',
                'slug' => 'kabel-dlya-svyazi',
            ],
            [
                'category_id' => 6,
                'name' => 'Наконечники кабельные',
                'slug' => 'nakonechniki-kabelnye',
            ],
            [
                'category_id' => 6,
                'name' => 'Сип и линейная арматура',
                'slug' => 'sip-i-linejnaya-armatura',
            ],
            [
                'category_id' => 6,
                'name' => 'Сип - 4 и кабель',
                'slug' => 'sip-4-i-kabel',
            ],
            [
                'category_id' => 6,
                'name' => 'Инструмент',
                'slug' => 'instrument',
            ],




            [
                'category_id' => 7,
                'name' => 'Металлические лотки',
                'slug' => 'metallicheskie-lotki',
            ],
            [
                'category_id' => 7,
                'name' => 'Кабельные каналы',
                'slug' => 'kabelnye-kanaly',
            ],
            [
                'category_id' => 7,
                'name' => 'Гофрированные трубы',
                'slug' => 'gofrirovannye-truby',
            ],
            [
                'category_id' => 7,
                'name' => 'Металлический рукав',
                'slug' => 'metallicheskij-rukav',
            ],
            [
                'category_id' => 7,
                'name' => 'Труба жёсткая ПВХ',
                'slug' => 'truba-zhestkaya-pvkh',
            ],




            [
                'category_id' => 8,
                'name' => 'Светильники НПП IP 54',
                'slug' => 'svetilniki-npp-ip-54',
            ],
            [
                'category_id' => 8,
                'name' => 'Светильники ЛПО',
                'slug' => 'svetilniki-lpo',
            ],
            [
                'category_id' => 8,
                'name' => 'Светильники ЛСП IP 65',
                'slug' => 'svetilniki-lsp-ip-65',
            ],
            [
                'category_id' => 8,
                'name' => 'Светильники ЛБА',
                'slug' => 'svetilniki-lba',
            ],
            [
                'category_id' => 8,
                'name' => 'Прожектора',
                'slug' => 'prozhektora',
            ],




            [
                'category_id' => 9,
                'name' => 'Силовые автоматы ВА 88',
                'slug' => 'silovye-avtomaty-va-88',
            ],
            [
                'category_id' => 9,
                'name' => 'Контакторы КМИ',
                'slug' => 'kontaktory-kmi',
            ],
            [
                'category_id' => 9,
                'name' => 'Контакторы КМИ в защитной оболочке',
                'slug' => 'kontaktory-kmi-v-zashchitnoj-obolochke',
            ],
            [
                'category_id' => 9,
                'name' => 'Контактор электромагнитный',
                'slug' => 'kontaktor-elektromagnitnyj',
            ],
            [
                'category_id' => 9,
                'name' => 'Устройство защиты двигателя ПРК',
                'slug' => 'ustrojstvo-zashchity-dvigatelya-prk',
            ],
            [
                'category_id' => 9,
                'name' => 'Контакторы модульные',
                'slug' => 'kontaktory-modulnye',
            ],

        ]);
    }
}
