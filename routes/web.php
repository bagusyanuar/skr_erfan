<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', 'Main\MainController');
Route::get('/ongkir/{tujuan}', 'Main\CartController@ongkir');
Route::get('/login', 'Auth\AuthController@pageLogin')->name('login');
Route::get('/loginadmin', 'Auth\AuthController@pageLoginAdmin');
Route::get('/register', 'Auth\AuthController@pageRegister');
Route::get('/logout', 'Auth\AuthController@logout');
Route::post('/post-register', 'Auth\AuthController@register');
Route::post('/post-login', 'Auth\AuthController@login');
Route::post('/postloginadmin', 'Auth\AuthController@loginAdmin');


Route::get('/products', 'Main\ProductsController@index');
Route::get('/products/{id}', 'Main\ProductsController@getProductsById');

Route::get('/cart', 'Main\CartController@index')->middleware('auth');
Route::post('/add-cart', 'Main\CartController@addToCart')->middleware('auth');
Route::get('/payment/{id}', 'Main\TransactionController@paymentPage');
Route::get('/transaction', 'Main\TransactionController@paymentHistory');
Route::get('/transaction/{id}', 'Main\TransactionController@transactionDetailPage');
Route::post('/pay', 'Main\TransactionController@pay');
Route::post('/checkout', 'Main\CartController@checkOut')->middleware('auth');

Route::get('/faq', 'Master\FaqController@faqPage');
Route::get('/about', function (){
    return view('shop.about');
});Route::get('/contact', function (){
    return view('shop.contact');
});

Route::get('/admin', function () {
    return view('admin.index');
});

Route::get('/admin/categories', 'Master\CategoriesControllers@index');
Route::get('/admin/categories/add', 'Master\CategoriesControllers@add');
Route::get('/admin/categories/edit/{id}', 'Master\CategoriesControllers@edit');
Route::post('/admin/categories/store', 'Master\CategoriesControllers@store');
Route::post('/admin/categories/patch', 'Master\CategoriesControllers@patch');
Route::post('/admin/categories/destroy/{id}', 'Master\CategoriesControllers@destroy');


Route::group(['prefix' => 'admin'], function () {

    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', 'Main\AdminController@index');
        Route::get('/add', 'Main\AdminController@addForm');
        Route::get('/edit/{id}', 'Main\AdminController@editForm');
        Route::post('/store', 'Main\AdminController@add');
        Route::post('/patch', 'Main\AdminController@patch');
        Route::post('/destroy/{id}', 'Main\AdminController@destroy');
    });

    Route::group(['prefix' => 'faq'], function () {
        Route::get('/', 'Master\FaqController@index');
        Route::get('/add', 'Master\FaqController@add');
        Route::get('/edit/{id}', 'Master\FaqController@edit');
        Route::post('/store', 'Master\FaqController@store');
        Route::post('/patch', 'Master\FaqController@patch');
        Route::post('/destroy/{id}', 'Master\FaqController@destroy');
    });

    Route::group(['prefix' => 'products'], function () {
        Route::get('/', 'Master\ProductsControllers@index');
        Route::get('/add', 'Master\ProductsControllers@pageAdd');
        Route::get('/edit/{id}', 'Master\ProductsControllers@pageEdit');
        Route::post('/store', 'Master\ProductsControllers@add');
        Route::post('/patch', 'Master\ProductsControllers@edit');
        Route::post('/destroy/{id}', 'Master\ProductsControllers@destroy');
    });

    Route::group(['prefix' => 'vouchers'], function () {
        Route::get('/', 'Master\VouchersControllers@index');
        Route::get('/add', 'Master\VouchersControllers@pageAdd');
        Route::get('/edit/{id}', 'Master\VouchersControllers@pageEdit');
        Route::post('/store', 'Master\VouchersControllers@add');
        Route::post('/patch', 'Master\VouchersControllers@edit');
    });

    Route::group(['prefix' => 'sliders'], function () {
        Route::get('/', 'Master\SlidersController@index');
        Route::get('/add', 'Master\SlidersController@pageAdd');
        Route::get('/edit/{id}', 'Master\SlidersController@pageEdit');
        Route::post('/store', 'Master\SlidersController@add');
        Route::post('/patch', 'Master\SlidersController@edit');
    });

    Route::group(['prefix' => 'transaction'], function () {
        Route::get('/', 'Main\TransactionController@listOrder');
        Route::post('/confirm', 'Main\TransactionController@confirm');
        Route::get('/detail/{id}', 'Main\TransactionController@orderDetail');
    });

    Route::group(['prefix' => 'report'], function (){
        Route::get('/selling', 'Laporan\PenjualanController@index');
        Route::get('/payment', 'Laporan\PembayaranController@index');
        Route::get('/items', 'Laporan\BarangTerjualController@index');
        Route::get('/selling/list', 'Laporan\PenjualanController@laporanPenjualan');
        Route::get('/payment/list', 'Laporan\PembayaranController@laporanPembayaran');
        Route::get('/items/list', 'Laporan\BarangTerjualController@laporanBarang');
        Route::get('/selling/print', 'Laporan\PenjualanController@cetak');
        Route::get('/payment/print', 'Laporan\PembayaranController@cetak');
        Route::get('/items/print', 'Laporan\BarangTerjualController@cetak');
    });
});

Route::group(['prefix' => 'ajax'], function () {
    Route::get('/products', 'Main\ProductsController@getProducts');
    Route::get('/voucher', 'Main\VoucherController@getVoucher');
    Route::post('/saveToCart', 'Main\TransactionController@addToCart')->middleware('auth');
    Route::get('/countCart', 'Main\CartController@countCart')->middleware('auth');
    Route::get('/sumCart', 'Main\CartController@sumCart')->middleware('auth');
    Route::post('/delete-cart/{id}', 'Main\CartController@deleteCart')->middleware('auth');
});


