<?php

namespace App\Admin\Controllers;

use App\Models\ChinaArea;
use App\Models\UserAddress;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;

class UserAddressesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '用户地址';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new UserAddress);

        $grid->id('ID')->sortable();
        $grid->column('user_id', '用户ID');
        $grid->column('province', '省份');
        $grid->column('city', '城市');
        $grid->column('district', '区域');
        $grid->column('address', '详细');
        $grid->column('zip', '邮编');
        $grid->column('contact_name', '收件人');
        $grid->column('contact_phone', '收件人电话');
        $grid->column('last_used_at', '最后使用时间');
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
        $show = new Show(UserAddress::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('User id'));
        $show->field('province', __('Province'));
        $show->field('city', __('City'));
        $show->field('district', __('District'));
        $show->field('address', __('Address'));
        $show->field('zip', __('Zip'));
        $show->field('contact_name', __('Contact name'));
        $show->field('contact_phone', __('Contact phone'));
        $show->field('last_used_at', __('Last used at'));
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
        $form = new Form(new UserAddress);

        $form->number('user_id', __('User id'));
        // $form->distpicker([
        //     'province' => '省份',
        //     'city' => '市',
        //     'district' => '区'
        // ]);
        $form->distpicker(['province', 'city', 'district']);
        $form->text('province', __('Province'));
        $form->text('city', __('City'));
        $form->text('district', __('District'));
        $form->text('address', __('Address'));
        $form->number('zip', __('Zip'));
        $form->text('contact_name', __('Contact name'));
        $form->text('contact_phone', __('Contact phone'));
        $form->datetime('last_used_at', __('Last used at'))->default(date('Y-m-d H:i:s'));

        // 定义事件回调，当模型即将保存时会触发这个回调
        // $form->saving(function (Form $form) {
        //     $form->province = ChinaArea::where('code', $form->province)->get('name');
        // });

        return $form;
    }
}
