<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use \App\Http\Controllers\Admin\MainController;
use \App\Http\Controllers\Admin\MenuController;
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
            Route::get('/add', [\App\Http\Controllers\Admin\ProductController::class, 'create'])->name('admin.products.add');
            Route::post('/add', [\App\Http\Controllers\Admin\ProductController::class, 'store']);
            Route::get('/list', [\App\Http\Controllers\Admin\ProductController::class, 'index'])->name('admin.products.list');
            Route::get('/edit/{product}', [\App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('admin.products.edit');
        });

//            upload
        Route::post('upload/services', [\App\Http\Controllers\Admin\UploadController::class, 'store']);
    });
});
