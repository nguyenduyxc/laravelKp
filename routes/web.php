<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use \App\Http\Controllers\Admin\MainController;
use \App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
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


Route::get('admin/users/login', [LoginController::class,'index'])->name('login');
Route::post('admin/users/login/store', [LoginController::class,'store']);

Route::middleware(['auth'])->group(function () {

    Route::prefix('admin')->group(function () {
        Route::get('/home', [MainController::class,'index'])->name('admin.home');

//        menu
        Route::prefix('menus')->group(function () {
            Route::get('/list', [MenuController::class, 'index'])->name('admin.menus.list');
            Route::get('/add', [MenuController::class, 'create'])->name('admin.menus.add');
            Route::post('/add', [MenuController::class, 'store']);
            Route::get('/edit/{menu}', [MenuController::class, 'edit']);
            Route::post('/edit/{menu}', [MenuController::class, 'update']);
            Route::DELETE('/destroy', [MenuController::class, 'destroy']);
        });


//        product
        Route::prefix('products')->group(function () {
            Route::get('/add', [ProductController::class, 'create'])->name('admin.products.add');
            Route::post('/add', [ProductController::class, 'store']);
            Route::get('/list', [ProductController::class, 'index'])->name('admin.products.list');
            Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('admin.products.edit');
            Route::post('/edit/{product}', [ProductController::class, 'update']);
            Route::DELETE('/destroy', [ProductController::class, 'destroy']);
        });

        //        slider
        Route::prefix('sliders')->group(function () {
            Route::get('/add', [SliderController::class, 'create'])->name('admin.sliders.add');
            Route::post('/add', [SliderController::class, 'store']);
            Route::get('/list', [SliderController::class, 'index'])->name('admin.sliders.list');
            Route::get('/edit/{slider}', [SliderController::class, 'edit'])->name('admin.sliders.edit');
            Route::post('/edit/{slider}', [SliderController::class, 'update']);
            Route::DELETE('/destroy', [SliderController::class, 'destroy']);
        });

//            upload
        Route::post('upload/services', [\App\Http\Controllers\Admin\UploadController::class, 'store']);
    });
});

Route::get('/', [\App\Http\Controllers\MainController::class, 'index']);
