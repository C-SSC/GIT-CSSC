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

Route::get('/', [\App\Http\Controllers\HomePageController::class, 'index']);

Route::get('/san-pham/{id}', [\App\Http\Controllers\HomePageController::class, 'viewSanPham']);
Route::get('/danh-muc/{id}', [\App\Http\Controllers\HomePageController::class, 'viewDanhMuc']);
Route::get('/cart', [\App\Http\Controllers\ChiTietDonHangController::class, 'index']);
Route::get('/cart/data', [\App\Http\Controllers\ChiTietDonHangController::class, 'dataCart']);
Route::post('/add-to-cart-update', [\App\Http\Controllers\ChiTietDonHangController::class, 'addToCartUpdate']);
Route::post('/remove-cart', [\App\Http\Controllers\ChiTietDonHangController::class, 'removeCart']);

Route::post('/add-to-cart', [\App\Http\Controllers\ChiTietDonHangController::class, 'addToCart']);

Route::get('/test', [\App\Http\Controllers\TestController::class, 'test']);

Route::group(['prefix' => '/admin'], function() {
    Route::group(['prefix' => '/danh-muc-san-pham'], function() {
        Route::get('/index', [\App\Http\Controllers\DanhMucSanPhamController::class, 'index_vue']);
        Route::post('/index', [\App\Http\Controllers\DanhMucSanPhamController::class, 'store']);
        Route::get('/data', [\App\Http\Controllers\DanhMucSanPhamController::class, 'getData']);

        Route::get('/doi-trang-thai/{id}', [\App\Http\Controllers\DanhMucSanPhamController::class, 'doiTrangThai']);

        Route::get('/delete/{id}', [\App\Http\Controllers\DanhMucSanPhamController::class, 'destroy']);
        Route::get('/edit/{id}', [\App\Http\Controllers\DanhMucSanPhamController::class, 'edit']);
        Route::post('/update', [\App\Http\Controllers\DanhMucSanPhamController::class, 'update']);

        Route::get('/edit-form/{id}', [\App\Http\Controllers\DanhMucSanPhamController::class, 'edit_form']);
        Route::post('/update-form', [\App\Http\Controllers\DanhMucSanPhamController::class, 'update_form']);

        // Route::get('/index-vue', [\App\Http\Controllers\DanhMucSanPhamController::class, 'index_vue']);
    });
    Route::group(['prefix' => '/san-pham'], function() {
        Route::get('/index', [\App\Http\Controllers\SanPhamVueController::class, 'index']);

        Route::get('/changeStatus/{id}', [\App\Http\Controllers\SanPhamVueController::class, 'changeStatus']);

        Route::get('/loadData', [\App\Http\Controllers\SanPhamVueController::class, 'loadData']);
        Route::post('/create', [\App\Http\Controllers\SanPhamVueController::class, 'store']);
        Route::post('/update', [\App\Http\Controllers\SanPhamVueController::class, 'update']);
        Route::get('/edit/{id}', [\App\Http\Controllers\SanPhamVueController::class, 'edit']);
        Route::get('/delete/{id}', [\App\Http\Controllers\SanPhamVueController::class, 'delete']);

        Route::post('/search', [\App\Http\Controllers\SanPhamVueController::class, 'search']);
    });

    Route::group(['prefix' => '/nhap-kho'], function() {
        Route::get('/index', [\App\Http\Controllers\KhoHangController::class, 'index']);

        Route::get('/loadData', [\App\Http\Controllers\KhoHangController::class, 'loadData']);
        Route::get('/add/{id}', [\App\Http\Controllers\KhoHangController::class, 'store']);

        Route::get('/remove/{id}', [\App\Http\Controllers\KhoHangController::class, 'destroy']);
        Route::post('/update', [\App\Http\Controllers\KhoHangController::class, 'update']);

        Route::get('/create', [\App\Http\Controllers\KhoHangController::class, 'create']);
    });

   
});
