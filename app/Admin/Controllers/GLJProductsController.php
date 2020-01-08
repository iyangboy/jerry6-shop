<?php

namespace App\Admin\Controllers;

use App\Models\GLJProduct;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class GLJProductsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '商品列表';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new GLJProduct);

        $grid->column('id', __('Id'));
        // $grid->column('category_id', __('Category id'));
        $grid->column('category.name', '分类');
        // $grid->column('brand_id', __('Brand id'));
        // $grid->column('brand_name', __('Brand name'));
        $grid->column('brand.name', '品牌');
        // $grid->column('series_id', __('Series id'));
        // $grid->column('series_name', __('Series name'));
        $grid->column('series.name', '系列');
        $grid->column('model_name', '型号');
        // $grid->column('parameter_key', __('Parameter key'));
        // $grid->column('parameter_text', __('Parameter text'));
        // $grid->column('parameter_json', '参数');
        $grid->column('part_number', '订货号');
        // $grid->column('url', __('Url'));
        // $grid->column('extract', __('Extract'));
        $grid->column('title', '标题');
        // $grid->column('long_title', __('Long title'));
        // $grid->column('description', __('Description'));
        // $grid->column('image', __('Image'));
        $grid->on_sale('已上架')->display(function ($value) {
            return $value ? '是' : '否';
        });
        $grid->column('rating', '评分');
        $grid->column('sold_count', '销量');
        $grid->column('review_count', '评论数');
        // $grid->column('price_text', __('Price text'));
        $grid->column('price', '价格');
        $grid->column('created_at', '创建时间');
        $grid->column('updated_at', '更新时间');

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
        $show = new Show(GLJProduct::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('category_id', __('Category id'));
        $show->field('brand_id', __('Brand id'));
        $show->field('brand_name', __('Brand name'));
        $show->field('series_id', __('Series id'));
        $show->field('series_name', __('Series name'));
        $show->field('model_name', __('Model name'));
        $show->field('parameter_key', __('Parameter key'));
        $show->field('parameter_text', __('Parameter text'));
        $show->field('parameter_json', __('Parameter json'));
        $show->field('part_number', __('Part number'));
        $show->field('url', __('Url'));
        $show->field('extract', __('Extract'));
        $show->field('title', __('Title'));
        $show->field('long_title', __('Long title'));
        $show->field('description', __('Description'));
        $show->field('image', __('Image'));
        $show->field('on_sale', __('On sale'));
        $show->field('rating', __('Rating'));
        $show->field('sold_count', __('Sold count'));
        $show->field('review_count', __('Review count'));
        $show->field('price_text', __('Price text'));
        $show->field('price', __('Price'));
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
        $form = new Form(new GLJProduct);

        $form->number('category_id', __('Category id'));
        $form->number('brand_id', __('Brand id'));
        $form->text('brand_name', __('Brand name'));
        $form->number('series_id', __('Series id'));
        $form->text('series_name', __('Series name'));
        $form->text('model_name', __('Model name'));
        $form->text('parameter_key', __('Parameter key'));
        $form->text('parameter_text', __('Parameter text'));
        $form->textarea('parameter_json', __('Parameter json'));
        $form->text('part_number', __('Part number'));
        $form->url('url', __('Url'));
        $form->textarea('extract', __('Extract'));
        $form->text('title', __('Title'));
        $form->text('long_title', __('Long title'));
        $form->textarea('description', __('Description'));
        $form->image('image', __('Image'));
        $form->switch('on_sale', __('On sale'))->default(1);
        $form->decimal('rating', __('Rating'))->default(5.00);
        $form->number('sold_count', __('Sold count'));
        $form->number('review_count', __('Review count'));
        $form->text('price_text', __('Price text'));
        $form->decimal('price', __('Price'));

        return $form;
    }
}
