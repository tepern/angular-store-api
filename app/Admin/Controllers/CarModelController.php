<?php

namespace App\Admin\Controllers;

use App\Models\CarModel;
use App\Models\CategoryId;
use App\Models\Thumbnail;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Facades\Storage;
use App\Admin\Selectable\Thumbnails;

class CarModelController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'CarModel';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new CarModel());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('description', __('Description'));
        $grid->column('priceMin', __('PriceMin'));
        $grid->column('priceMax', __('PriceMax'));
        $grid->column('number', __('Number'));
        $grid->column('category_id', __('Category id'));
        $grid->column('tank', __('Tank'));
        $grid->column('colors', __('Colors'));
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
        $show = new Show(CarModel::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('description', __('Description'));
        $show->field('priceMin', __('PriceMin'));
        $show->field('priceMax', __('PriceMax'));
        $show->field('number', __('Number'));
        $show->field('category_id', __('Category id'));
        $show->field('thumbnail_id', __('Thumbnail id'));
        $show->field('tank', __('Tank'));
        $show->field('colors', __('Colors'));
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
        $form = new Form(new CarModel());

        $form->text('name', __('Name'));
        $form->textarea('description', __('Description'));
        $form->number('priceMin', __('PriceMin'));
        $form->number('priceMax', __('PriceMax'));
        $form->text('number', __('Number'));
        $form->hidden('thumbnail_id', __('Thumbnail id'));
        $form->number('tank', __('Tank'));
        $form->list('colors', __('Colors'))->rules('required|min:3')->min(1);

        $form->select('category_id',  __('Category'))->options(CategoryId::all()->pluck('name','id'));
        $form->image('thumbnail.originalname');
        $form->saving(function (Form $form) {
            $this->saveThumbnail($form);
         });
        return $form;
    }

    /**
     * Save thumbnail.
     *
     * @param Form $form
     * 
     * @return void
     */
    function saveThumbnail($form) 
    {
        $thumbnail = new Thumbnail($form->thumbnail);
        if (!empty($thumbnail->originalname)) {
            $img = $thumbnail->originalname;
            $thumbnail->originalname = $img->getClientOriginalName();
            $thumbnail->mimetype = $img->getMimeType();
            $thumbnail->size = $img->getSize();
            $data = file_get_contents($img);
            $thumbnail->size = filesize($img);
            $type = $thumbnail->mimetype;
            $thumbnail->path = 'data:' . $type . ';base64,' . base64_encode($data);

            if (!empty($form->thumbnail_id)) {
                $image = Thumbnail::find($form->thumbnail_id);
                $image->originalname = $thumbnail->originalname;
                $image->mimetype = $thumbnail->mimetype;
                $image->size = $thumbnail->size;
                $image->path = $thumbnail->path;
                $image->update();
            } else {
                $thumbnail->save();
                $form->thumbnail_id = $thumbnail->id;
            }
        }
    } 
}
