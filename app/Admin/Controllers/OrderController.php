<?php

namespace App\Admin\Controllers;

use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\City;
use App\Models\Point;
use App\Models\Rate;
use App\Models\CarModel;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Admin\Selectable\CarModels;

class OrderController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Order';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Order());

        $grid->column('id', __('Id'));
        $grid->column('order_status_id', __('Order status'));
        $grid->column('city_id', __('City'));
        $grid->column('point_id', __('Point'));
        $grid->column('car_id', __('Car'));
        $grid->column('rate_id', __('Rate'));
        $grid->column('color', __('Color'));
        $grid->column('date_from', __('Date from'));
        $grid->column('date_to', __('Date to'));
        $grid->column('price', __('Price'));
        $grid->column('is_full_tank', __('Is full tank'))->bool();
        $grid->column('is_need_child_chair', __('Is need child chair'))->bool();
        $grid->column('is_right_wheel', __('Is right wheel'))->bool();
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Order::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('order_status_id', __('Order status id'));
        $show->field('city_id', __('City id'));
        $show->field('point_id', __('Point id'));
        $show->field('car_id', __('Car id'));
        $show->field('rate_id', __('Rate id'));
        $show->field('color', __('Color'));
        $show->field('date_from', __('Date from'));
        $show->field('date_to', __('Date to'));
        $show->field('price', __('Price'));
        $show->field('is_full_tank', __('Is full tank'));
        $show->field('is_need_child_chair', __('Is need child chair'));
        $show->field('is_right_wheel', __('Is right wheel'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Order());

        $form->select('order_status_id', __('Order status'))->options(OrderStatus::all()->pluck('name','id'));
        $form->select('city_id', __('City'))->options(City::all()->pluck('name','id'));
        $form->select('point_id',  __('Point'))->options(Point::all()->pluck('name','id'));
        $form->belongsTo('car_id', CarModels::class, __('Car model'));
        $form->select('rate_id', __('Rate'))->options(Rate::all()->pluck('price','id'));
        $form->text('color', __('Color'));
        $form->number('date_from', __('Date from'));
        $form->number('date_to', __('Date to'));
        $form->decimal('price', __('Price'));
        $form->switch('is_full_tank', __('Is full tank'));
        $form->switch('is_need_child_chair', __('Is need child chair'));
        $form->switch('is_right_wheel', __('Is right wheel'));

        return $form;
    }
}
