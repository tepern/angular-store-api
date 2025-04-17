<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rates')->truncate();
        $rates = [
            [
                'rate_type_id' => 3,
                'price' => 1000
            ],
            [
                'rate_type_id' => 3,
                'price' => 2700
            ]
        ];
        DB::table('rates')->insert($rates);
    }
}
