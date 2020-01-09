<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/
ini_set('max_execution_time', 0);
Route::get('test-product-sku', 'TestsController@productSku');
Route::get('test-product-table', 'TestsController@productTable');
// 数据采集测试
Route::get('test-index-zyd-caiji', 'TestsController@indexZYDCaiJi');
Route::get('test-alipay', function() {
    return app('alipay')->web([
        'out_trade_no' => time(),
        'total_amount' => '1',
        'subject' => 'test subject - 测试',
    ]);
});

//Route::get('/', 'PagesController@root')->name('root');
Route::redirect('/', '/products')->name('root');
Route::get('products', 'ProductsController@index')->name('products.index');

Auth::routes(['verify' => true]);

// auth 中间件代表需要登录，verified中间件代表需要经过邮箱验证
Route::group(['middleware' => ['auth', 'verified']], function() {

    // 用户信息
    Route::get('/users/{user}', 'UsersController@show')->name('users.show');
    Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');
    Route::patch('/users/{user}', 'UsersController@update')->name('users.update');
    Route::put('/users/{user}', 'UsersController@update')->name('users.update');

    // 用户地址
    Route::get('user_addresses', 'UserAddressesController@index')->name('user_addresses.index');
    Route::get('user_addresses/create', 'UserAddressesController@create')->name('user_addresses.create');
    Route::post('user_addresses', 'UserAddressesController@store')->name('user_addresses.store');
    Route::get('user_addresses/{user_address}', 'UserAddressesController@edit')->name('user_addresses.edit');
    Route::put('user_addresses/{user_address}', 'UserAddressesController@update')->name('user_addresses.update');
    Route::delete('user_addresses/{user_address}', 'UserAddressesController@destroy')->name('user_addresses.destroy');

    // 添加收藏
    Route::post('products/{product}/favorite', 'ProductsController@favor')->name('products.favor');
    // 取消收藏
    Route::delete('products/{product}/favorite', 'ProductsController@disfavor')->name('products.disfavor');
    // 收藏列表
    Route::get('products/favorites', 'ProductsController@favorites')->name('products.favorites');

    // 查看购物车
    Route::get('cart', 'CartController@index')->name('cart.index');
    // 添加到购物车
    Route::post('cart', 'CartController@add')->name('cart.add');
    // 移除购物车商品
    Route::delete('cart/{sku}', 'CartController@remove')->name('cart.remove');

    // 用户订单列表
    Route::get('orders', 'OrdersController@index')->name('orders.index');
    // 创建订单
    Route::post('orders', 'OrdersController@store')->name('orders.store');
    // 订单详情
    Route::get('orders/{order}', 'OrdersController@show')->name('orders.show');
    // 订单-确认收货
    Route::post('orders/{order}/received', 'OrdersController@received')->name('orders.received');
    // 订单-评价
    Route::get('orders/{order}/review', 'OrdersController@review')->name('orders.review.show');
    // 订单-评价-提交
    Route::post('orders/{order}/review', 'OrdersController@sendReview')->name('orders.review.store');
    // 订单-申请退款
    Route::post('orders/{order}/apply_refund', 'OrdersController@applyRefund')->name('orders.apply_refund');

    // 支付宝支付
    Route::get('payment/{order}/alipay', 'PaymentController@payByAlipay')->name('payment.alipay');
    // 支付宝支付-前端回调页面
    Route::get('payment/alipay/return', 'PaymentController@alipayReturn')->name('payment.alipay.return');

    // 微信支付
    Route::get('payment/{order}/wechat', 'PaymentController@payByWechat')->name('payment.wechat');

    // 优惠码-查询
    Route::get('coupon_codes/{code}', 'CouponCodesController@show')->name('coupon_codes.show');
});
// 支付宝支付-服务器端回调
Route::post('payment/alipay/notify', 'PaymentController@alipayNotify')->name('payment.alipay.notify');

// 微信支付-服务器端回调
Route::post('payment/wechat/notify', 'PaymentController@wechatNotify')->name('payment.wechat.notify');
// 微信退款-回调
Route::post('payment/wechat/refund_notify', 'PaymentController@wechatRefundNotify')->name('payment.wechat.refund_notify');

Route::get('products/{product}', 'ProductsController@show')->name('products.show');
