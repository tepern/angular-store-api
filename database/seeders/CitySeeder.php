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
        
        $cities = [
            [
                'name' => 'Москва',
                'description' => 'Москва и Московская область'
            ],
            [
                'name' => 'Ульяновск'
            ],
            [
                'name' => 'Екатеринбург'
            ],
            [
                'name' => 'Ростов-на-Дону'
            ],
            [
                'name' => 'Самара'
            ]
        ];
        DB::table('cities')->insert($cities);
    }
}
