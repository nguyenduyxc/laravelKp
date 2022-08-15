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
            Route::DELETE('/destroy', [MenuController::class, 'destroy']);
        });

    });
});
