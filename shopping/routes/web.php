<?php

use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminSettingController;
use App\Http\Controllers\AdminSliderController;
use App\Http\Controllers\AdminUserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/hello', function () {
    return "Hello Nghia Tap Code";
});

Route::get('/admin', [AdminController::class, 'loginAdmin'])->name('login');
Route::post('/admin', [AdminController::class, 'postLoginAdmin']);

Route::get("/home", function () {
    return view('home');
});
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

// category, menu, product route
Route::prefix('admin')->group(function () {
    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::get('/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
        Route::post('/delete/{id}', [CategoryController::class, 'destroy'])->name('categories.delete');
    });

    Route::prefix('menus')->group(function () {
        Route::get('/', [MenuController::class, 'index'])->name('menus.index');
        Route::get('/create', [MenuController::class, 'create'])->name('menus.create');
        Route::post('/store', [MenuController::class, 'store'])->name('menus.store');
        Route::get('/{id}/edit', [MenuController::class, 'edit'])->name('menus.edit');
        Route::post('/{id}/update', [MenuController::class, 'update'])->name('menus.update');
        Route::get('{id}/delete', [MenuController::class, 'delete'])->name('menus.delete');
    });

    Route::prefix('products')->group(function () {
        Route::get('/', [AdminProductController::class, 'index'])->name('products.index');
        Route::get('/create', [AdminProductController::class, 'create'])->name('products.create');
        Route::post('/store', [AdminProductController::class, 'store'])->name('products.store');
        Route::get('/{id}/edit', [AdminProductController::class, 'edit'])->name('products.edit');
        Route::post('/{id}/update', [AdminProductController::class, 'update'])->name('products.update');
        Route::get('/{id}/delete', [AdminProductController::class, 'delete'])->name('products.delete');
    });

    Route::prefix('slider')->group(function () {
        Route::get('/', [AdminSliderController::class, 'index'])->name('slider.index');
        Route::get('/create', [AdminSliderController::class, 'create'])->name('slider.create');
        Route::post('/store', [AdminSliderController::class, 'store'])->name('slider.store');
        Route::get('/edit/{id}', [AdminSliderController::class, 'edit'])->name('slider.edit');
        Route::post('/update/{id}', [AdminSliderController::class, 'update'])->name('slider.update');
        Route::get('/delete/{id}', [AdminSliderController::class, 'delete'])->name('slider.delete');
    });

    Route::prefix('setting')->group(function () {
        Route::get('/', [AdminSettingController::class, 'index'])->name('setting.index');
        Route::get('/create', [AdminSettingController::class, 'create'])->name('setting.create');
        Route::post('/store', [AdminSettingController::class, 'store'])->name('setting.store');
        Route::get('/edit/{id}', [AdminSettingController::class, 'edit'])->name('setting.edit');
        Route::post('update/{id}', [AdminSettingController::class, 'update'])->name('setting.update');
        Route::get('delete/{id}', [AdminSettingController::class, 'delete'])->name('setting.delete');
    });

    Route::prefix('user')->group(function () {
        Route::get('/', [AdminUserController::class, 'index'])->name('user.index');
        Route::get('/create', [AdminUserController::class, 'create'])->name('user.create');
    });
});
