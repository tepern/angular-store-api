<?php

namespace App\Admin\Controllers;

use App\Models\Rate;
use App\Models\RateType;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class RateController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Rate';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Rate());

        $grid->column('id', __('Id'));
        $grid->column('price', __('Price'));
        $grid->column('rate_type_id', __('Rate type id'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->column('deleted_at', __('Deleted at'));

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
        $show = new Show(Rate::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('price', __('Price'));
        $show->field('rate_type_id', __('Rate type id'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('deleted_at', __('Deleted at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Rate());

        $form->number('price', __('Price'));
        $form->select('rate_type_id',  __('Rate type'))->options(RateType::all()->pluck('name','id'));

        return $form;
    }
}
