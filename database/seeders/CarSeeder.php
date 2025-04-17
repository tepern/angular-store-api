<?php

namespace Database\Seeders;

use App\Models\CarModel;
use App\Models\CategoryId;
use App\Models\Thumbnail;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('car_models')->truncate();
        $json = File::get(base_path() . '/database/data/data_car.json');
        $data = json_decode($json);
        $cars = $data->data;
        foreach ($cars as $car) {
            $thumbnail = Thumbnail::whereOriginalname($car->thumbnail->originalname)->first();
            $category = CategoryId::where('id', $car->categoryId->id)->first() ?? CategoryId::where('name', $car->categoryId->name)->first();
            if (empty($category)) {
                $category = CategoryId::create([
                    'name' => $car->categoryId->name,
                    'description' => $car->categoryId->description
                ]);
            }
            CarModel::create([
                'description' => $car->description,
                'priceMin' => $car->priceMin,
                'priceMax' => $car->priceMax,
                'name' => $car->name,
                'number' => $car->number,
                'category_id' => $category->id,
                'thumbnail_id' => $thumbnail->id ?? null,
                'tank' => $car->tank,
                'colors' => $car->colors
            ]);
        }
    }
}
