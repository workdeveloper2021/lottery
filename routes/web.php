<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\shopController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\OrderController;

use App\Http\Controllers\WebController;

 
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

Auth::routes();

Route::get('/', [App\Http\Controllers\WebController::class, 'index'])->name('home');


Route::get('/demo', [App\Http\Controllers\WebController::class, 'demo']);

Route::post('/ajaxfortime', [App\Http\Controllers\WebController::class, 'ajaxfortime'])->name('ajaxfortime');
Route::get('/checkkwinn', [App\Http\Controllers\WebController::class, 'checkkwinn'])->name('checkkwinn');
Route::post('/checkresulttt', [App\Http\Controllers\WebController::class, 'checkresulttt'])->name('checkresulttt');
Route::get('/result_refresh', [App\Http\Controllers\WebController::class, 'result_refresh'])->name('result_refresh');
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');


Route::group(['middleware' => ['auth']], function() {
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    
    Route::resource('shop', shopController::class);
    Route::get('shop-List/', [shopController::class, 'shopList'])->name('shops-list');
    
    Route::resource('categorys', CategoryController::class);
    Route::get('category-list/', [CategoryController::class, 'categoryList'])->name('category-list');
   
    Route::resource('product', ProductController::class);
    Route::get('product-list/', [ProductController::class, 'productList'])->name('product-list');  
    Route::post('/import',[ProductController::class,'import'])->name('import');
    Route::get('delete-image/{id}', [ProductController::class, 'deleteimage'])->name('deleteimage'); 

    Route::get('state-list/', [HomeController::class, 'stateList'])->name('state-list');
    Route::get('city-list/', [HomeController::class, 'cityList'])->name('city-list');
    Route::get('fetchvendorsList/', [HomeController::class, 'fetchvendorsList'])->name('fetch-vendor');

    Route::resource('vendors', VendorController::class);
    Route::get('vendorsList/', [VendorController::class, 'vendorsList'])->name('vendors-list');

    Route::resource('color', ColorController::class);
    Route::get('color-List/', [ColorController::class, 'colorList'])->name('color-list');
  
    Route::resource('size', SizeController::class);
    Route::get('size-List/', [SizeController::class, 'sizeList'])->name('size-list');

    Route::resource('brands', BrandController::class);
    Route::get('brands-List/', [BrandController::class, 'brandList'])->name('brands-list');

    Route::resource('sliders', SliderController::class);
    Route::get('slider-List/', [SliderController::class, 'sliderList'])->name('slider-list');
    
    Route::get('orders/', [OrderController::class, 'index'])->name('orders');
    Route::get('orders-List/', [OrderController::class, 'ordersList'])->name('orders-list');
    Route::get('order-invoice/{id}', [OrderController::class, 'invoice'])->name('order.invoice');
   
    
});