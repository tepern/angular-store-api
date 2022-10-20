<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Encore\Admin\Auth\Database\Menu;
use Encore\Admin\Auth\Database\Role;
use Illuminate\Support\Facades\DB;

class AdminMenuOrderSeeder extends Seeder
{
    /** @var Role */

    private $mainAdminRole;
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->mainAdminRole = Role::query()->where(['slug' => 'level-5'])->first();

        $this->createOrderStatusMenu($this->mainAdminRole);
        $this->createOrderMenu($this->mainAdminRole);
    }

    /**
     * @param Role $role
     * @return void
     */
    private function createOrderStatusMenu(Role $role): void
    {
        $menu = Menu::create([
            'parent_id' => 0,
            'order'     => 130,
            'title'     => 'Статус заказа',
            'icon'      => 'fa-bookmark',
            'uri'       => 'order-statuses',
        ]);

        $menu->roles()->detach($role);
        $menu->roles()->detach($this->mainAdminRole);
        $menu->roles()->attach($role);
        $menu->roles()->attach($this->mainAdminRole);
    }

    /**
     * @param Role $role
     * @return void
     */
    private function createOrderMenu(Role $role): void
    {
        $menu = Menu::create([
            'parent_id' => 0,
            'order'     => 140,
            'title'     => 'Заказы',
            'icon'      => 'fa-shopping-cart',
            'uri'       => 'orders',
        ]);

        $menu->roles()->detach($role);
        $menu->roles()->detach($this->mainAdminRole);
        $menu->roles()->attach($role);
        $menu->roles()->attach($this->mainAdminRole);
    }
}
