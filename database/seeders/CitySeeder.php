<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->truncate();
        $cities = [
            [
                'name' => 'Москва',
                'description' => 'Москва и Московская область'
            ],
            [
                'name' => 'Ульяновск',
                'description' => ''
            ],
            [
                'name' => 'Екатеринбург',
                'description' => ''
            ],
            [
                'name' => 'Ростов-на-Дону',
                'description' => ''
            ],
            [
                'name' => 'Самара',
                'description' => ''
            ]
        ];
        DB::table('cities')->insert($cities);
    }
}
