<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(AdminUserRolePermissionSeeder::class);
        $this->call(AdminMenuSeeder::class);
        $this->call(AdminMenuOrderSeeder::class);
        $this->call(RateTypeSeeder::class);
        $this->call(RateSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ThumbnailSeeder::class);
        $this->call(CarSeeder::class);
    }
}
