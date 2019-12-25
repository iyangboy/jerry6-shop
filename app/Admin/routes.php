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
    // 商品
    $router->get('products', 'ProductsController@index');
    $router->get('products/create', 'ProductsController@create');
    $router->post('products', 'ProductsController@store');
    $router->get('products/{id}/edit', 'ProductsController@edit');
    $router->put('products/{id}', 'ProductsController@update');

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
});
