<?php

namespace Database\Seeders;

use App\Models\Point;
use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $points = [
            [
                'name' => 'Ленинградский проспект',
                'address' => 'Ленинградский проспект, д. 7',
                'city_id' => 1
            ],
            [
                'name' => 'ул. Кузнецкий мост, 21',
                'address' => 'ул. Кузнецкий мост 21',
                'city_id' => 1
            ],
            [
                'name' => 'Проспект Созидателей',
                'address' => 'Проспект Созидателей 15',
                'city_id' => 2
            ],
            [
                'name' => 'Проспект Филатова',
                'address' => 'Проспект Филатова 10',
                'city_id' => 2
            ],
            [
                'name' => 'ул. Гончарова',
                'address' => 'ул. Гончарова, д. 32',
                'city_id' => 2
            ],
            [
                'name' => 'Ботанический',
                'address' => 'ул. 8 Марта, 171',
                'city_id' => 3
            ],
            [
                'name' => 'Парк',
                'address' => 'ул. 18-я Линия, 89',
                'city_id' => 4
            ],
            [
                'name' => 'ул. Ленина',
                'address' => 'ул. Ленина, д. 1',
                'city_id' => 5
            ]
        ];
        foreach ($points as $point) {
            $name = Point::where('name', $point['name'])->first();
            $city = City::where('id', $point['city_id'])->first();
            if (empty($name) && !empty($city) ) {
                DB::table('points')->insert($point);
            }
        }
    }
}
