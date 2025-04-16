<?php

namespace Database\Seeders;

use App\Models\Thumbnail;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ThumbnailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get('database\data\data_car.json');
        $data = json_decode($json);
        $cars = $data->data;
        foreach ($cars as $car) {
            Thumbnail::create([
                'originalname' => $car->thumbnail->originalname,
                'mimetype' => $car->thumbnail->mimetype,
                'path' => $car->thumbnail->path,
                'size' => $car->thumbnail->size
            ]);
        }
    }
}
