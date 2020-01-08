<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use App\Models\Product;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ProductsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '商品';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Product);

        // 快捷搜索
        $grid->quickSearch('title', 'brand_name', 'series_name');

        // 使用 with 来预加载商品类目数据，减少 SQL 查询
        $grid->model()->with(['category']);

        $grid->selector(function (Grid\Tools\Selector $selector) {
            $selector->select('brand_name', '品牌', [
                // 1020 => '施耐德',
                // 1002 => '西门子',
                'ABB'     => 'ABB',
                '施耐德'  => '施耐德',
                '西门子'   => '西门子',
                'ZYDMALL' => 'ZYDMALL',
                '上海二工' => '上海二工',
                '上海人民' => '上海人民',
                '上海华通' => '上海华通',
                '上海陶瓷' => '上海陶瓷',
                '乐超'    => '乐超',
                '伊顿'    => '伊顿',
                '众业达'  => '众业达',
                '凯帆'    => '凯帆',
                '天正电气' => '天正电气',
                '天逸'    => '天逸',
                '尤提乐'  => '尤提乐',
                '常熟'    => '常熟',
                '德力西'  => '德力西',
                '德威克'  => '德威克',
                '施耐德万高' => '施耐德万高',
                '晨露电力' => '晨露电力',
                '杭申电气' => '杭申电气',
                '汉华'    => '汉华',
                '环宇'    => '环宇',
                '研华'    => '研华',
                '罗格朗'  => '罗格朗',
                '菲尼克斯' => '菲尼克斯',
                '许继'    => '许继',
            ]);

            /*$selector->select('price', '价格', ['0-199', '200-499', '500-999', '1000-1499', '1500-1999', '>2000'], function ($query, $value) {
                $between = [
                    [0, 199],
                    [200, 499],
                    [500, 999],
                    [1000, 1499],
                    [1500, 1999],
                    [2000, 999999999],
                ];
                $query->whereBetween('price', $between[$value]);
            });*/
        });

        $grid->filter(function($filter){

            // 去掉默认的id过滤器
            // $filter->disableIdFilter();

            // 在这里添加字段过滤器

            $filter->column(1/2, function ($filter) {
                $filter->like('title', '名称');
                $filter->between('price', '价格');
            });

            $filter->column(1/2, function ($filter) {
                $filter->equal('created_at')->datetime();
                $filter->between('updated_at')->datetime();
                $filter->equal('on_sale', '上架')->radio([
                    1 => '是',
                    0 => '否',
                ]);
            });

        });

        $grid->id('ID')->sortable();
        $grid->column('image', '图片')->image(100, 100);
        $grid->title('商品名称');
        // Laravel-Admin 支持用符号 . 来展示关联关系的字段
        $grid->column('category.name', '类目');
        $grid->column('brand.name', '品牌');
        $grid->column('series.name', '系列');
        $grid->column('model_name', '型号');
        $grid->column('part_number', '订货号');
        $grid->on_sale('已上架')->display(function ($value) {
            return $value ? '是' : '否';
        })->label([
            '是' => 'success',
            '否' => 'warning',
        ])->filter([
            0 => '否',
            1 => '是',
        ]);
        $grid->price('价格')->sortable()->filter('range');
        $grid->rating('评分');
        $grid->sold_count('销量');
        $grid->review_count('评论数');

        $grid->actions(function ($actions) {
            $actions->disableView();
            $actions->disableDelete();
        });
        $grid->tools(function ($tools) {
            // 禁用批量删除按钮
            $tools->batch(function ($batch) {
                $batch->disableDelete();
            });
        });

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
        $show = new Show(Product::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('description', __('Description'));
        $show->field('image', __('Image'));
        $show->field('on_sale', __('On sale'));
        $show->field('rating', __('Rating'));
        $show->field('sold_count', __('Sold count'));
        $show->field('review_count', __('Review count'));
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
        $form = new Form(new Product);

        // 创建一个输入框，第一个参数 title 是模型的字段名，第二个参数是该字段描述
        $form->text('title', '商品名称')->rules('required');

        // 添加一个类目字段，与之前类目管理类似，使用 Ajax 的方式来搜索添加
        $form->select('category_id', '类目')->options(function ($id) {
            $category = Category::find($id);
            if ($category) {
                return [$category->id => $category->full_name];
            }
        })->ajax('/admin/api/categories?is_directory=0');

        // 创建一个选择图片的框
        $form->image('image', '封面图片')->rules('required|image');

        // 创建一个富文本编辑器
        //$form->editor('description', '商品描述')->rules('required');
        $form->quill('description', '商品描述')->rules('required');

        // 创建一组单选框
        $form->radio('on_sale', '上架')->options(['1' => '是', '0'=> '否'])->default('0');

        // 直接添加一对多的关联模型
        $form->hasMany('skus', 'SKU 列表', function (Form\NestedForm $form) {
            $form->text('title', 'SKU 名称')->rules('required');
            $form->text('description', 'SKU 描述')->rules('required');
            $form->text('price', '单价')->rules('required|numeric|min:0.01');
            $form->text('stock', '剩余库存')->rules('required|integer|min:0');
        });

        $form->hasMany('properties', '商品属性', function (Form\NestedForm $form) {
            $form->text('name', '属性名')->rules('required');
            $form->text('value', '属性值')->rules('required');
        });

        // 定义事件回调，当模型即将保存时会触发这个回调
        $form->saving(function (Form $form) {
            $form->model()->price = collect($form->input('skus'))->where(Form::REMOVE_FLAG_NAME, 0)->min('price') ?: 0;
        });

        return $form;
    }
}
