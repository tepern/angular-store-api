<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
                'name' => 'Эконом'
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

    }
}
