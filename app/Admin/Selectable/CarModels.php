<?php
namespace App\Admin\Selectable;

use App\Models\CarModel;
use Encore\Admin\Grid\Filter;
use Encore\Admin\Grid\Selectable;

class CarModels extends Selectable
{
    public $model = CarModel::class;

    public function make()
    {
        $this->column('id');
        $this->column('name');
        $this->column('colors');

        $this->filter(function (Filter $filter) {
            $filter->like('name');
        });
    }
}