<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Эконом',
                'description' => ''
            ],
            [
                'name' => "Люкс",
                'description' => 'Автомобили премиум класса'
            ],
            [
                'name' => "Спорт",
                'description' => 'Спортивный автомобиль'
            ],
            [
                'name' => "Стандарт",
                'description' => 'Оптимальное решение'
            ]
        ];
        DB::table('category_ids')->insert($categories);
    }
}
