<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');
    // 用户
    $router->resource('users', UsersController::class);
    // 用户地址
    $router->resource('user_addresses', UserAddressesController::class);
    // 商品
    $router->get('products', 'ProductsController@index')->name('admin.products.index');
    $router->get('products/{id}', 'ProductsController@show')->name('admin.products.show');
    $router->get('products/create', 'ProductsController@create');
    $router->post('products', 'ProductsController@store');
    $router->get('products/{id}/edit', 'ProductsController@edit');
    $router->put('products/{id}', 'ProductsController@update');
    // 获取子分类
    $router->get('api/category_children', 'ProductsController@categoryChildren');
    // 获取分类品牌
    $router->get('api/category_brand', 'ProductsController@categoryBrand');
    // 获取品牌系列
    $router->get('api/brand_series', 'ProductsController@brandSeries');

    // 商品
    $router->resource('glj-products', GLJProductsController::class);

    // 订单
    $router->get('orders', 'OrdersController@index')->name('admin.orders.index');
    // 订单-详情
    $router->get('orders/{order}', 'OrdersController@show')->name('admin.orders.show');
    // 订单-物流-发货
    $router->post('orders/{order}/ship', 'OrdersController@ship')->name('admin.orders.ship');
    // 订单退款审核
    $router->post('orders/{order}/refund', 'OrdersController@handleRefund')->name('admin.orders.handle_refund');

    // 优惠券列表
    $router->get('coupon_codes', 'CouponCodesController@index');
    // 优惠券-新增
    $router->get('coupon_codes/create', 'CouponCodesController@create');
    // 优惠券-新增-提交
    $router->post('coupon_codes', 'CouponCodesController@store');
    // 优惠券-编辑
    $router->get('coupon_codes/{id}/edit', 'CouponCodesController@edit');
    // 优惠券-编辑-提交
    $router->put('coupon_codes/{id}', 'CouponCodesController@update');
    // 优惠券-删除
    $router->delete('coupon_codes/{id}', 'CouponCodesController@destroy');

    // 商品分类
    // $router->resource('categories', CategoriesController::class);
    $router->get('categories', 'CategoriesController@index')->name('admin.categories.index');
    $router->get('categories/create', 'CategoriesController@create');
    $router->get('categories/{id}/edit', 'CategoriesController@edit');
    $router->post('categories', 'CategoriesController@store');
    $router->put('categories/{id}', 'CategoriesController@update');
    $router->delete('categories/{id}', 'CategoriesController@destroy');
    $router->get('api/categories', 'CategoriesController@apiIndex');
    // 查看子分类
    $router->get('categories_children/{id}', 'CategoriesController@indexCategoriesChildren')->name('admin.categories_children.index');
    // 添加分类
    $router->post('categories_add', 'CategoriesController@categoriesAdd')->name('admin.categories_add.index');
    $router->put('categories_edit', 'CategoriesController@categoriesEdit')->name('admin.categories_edit.index');
    $router->delete('categories_delete', 'CategoriesController@delete')->name('admin.categories.delete');

    $router->resource('categories_v', CategoriesVController::class);

    // 品牌管理
    $router->resource('brands', BrandsController::class);
});
