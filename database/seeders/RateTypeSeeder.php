<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RateTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rate_types')->truncate();
        $rateTypes = [
            [
                'name' => 'Почасовый',
                'unit' => 'час'
            ],
            [
                'name' => 'Месячный',
                'unit' => '30 дней'
            ],
            [
                'name' => 'Суточный',
                'unit' => 'сутки'
            ]
        ];
        DB::table('rate_types')->insert($rateTypes);
    }
}
