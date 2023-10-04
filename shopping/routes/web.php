<?php

use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminMenuController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminRoleController;
use App\Http\Controllers\AdminSettingController;
use App\Http\Controllers\AdminSliderController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminPermissionController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerCategory;
use App\Http\Controllers\CustomerProductContoller;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\Authenticate;
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


//login, logout
Route::get('/admin', [AdminController::class, 'loginAdmin'])->name('login');
Route::post('/admin', [AdminController::class, 'postLoginAdmin']);
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('logout');
Route::get('/welcome', function () {
    return view('welcome');
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

// category, menu, product route
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::prefix('categories')->group(function () {
        Route::get('/', [AdminCategoryController::class, 'index'])->name('categories.index')->middleware('can:list-category');
        Route::get('/create', [AdminCategoryController::class, 'create'])->name('categories.create')->middleware('can:add-category');
        Route::post('/store', [AdminCategoryController::class, 'store'])->name('categories.store');
        Route::get('/{id}/edit', [AdminCategoryController::class, 'edit'])->name('categories.edit')->middleware('can:edit-category');
        Route::get('/update/{id}', [AdminCategoryController::class, 'update'])->name('categories.update');
        Route::post('/delete/{id}', [AdminCategoryController::class, 'destroy'])->name('categories.delete')->middleware('can:delete-category');
    });

    Route::prefix('menus')->group(function () {
        Route::get('/', [AdminMenuController::class, 'index'])->name('menus.index')->middleware('can:list-menu');
        Route::get('/create', [AdminMenuController::class, 'create'])->name('menus.create')->middleware('can:add-menu');
        Route::post('/store', [AdminMenuController::class, 'store'])->name('menus.store');
        Route::get('/{id}/edit', [AdminMenuController::class, 'edit'])->name('menus.edit')->middleware('can:edit-menu');
        Route::post('/{id}/update', [AdminMenuController::class, 'update'])->name('menus.update');
        Route::get('{id}/delete', [AdminMenuController::class, 'delete'])->name('menus.delete')->middleware('can:delete-menu');
    });

    Route::prefix('products')->group(function () {
        Route::get('/', [AdminProductController::class, 'index'])->name('products.index')->middleware('can:list-product');
        Route::get('/create', [AdminProductController::class, 'create'])->name('products.create')->middleware('can:add-product');
        Route::post('/store', [AdminProductController::class, 'store'])->name('products.store');
        Route::get('/{id}/edit', [AdminProductController::class, 'edit'])->name('products.edit')->middleware('can:edit-product');
        Route::post('/{id}/update', [AdminProductController::class, 'update'])->name('products.update');
        Route::get('/{id}/delete', [AdminProductController::class, 'delete'])->name('products.delete')->middleware('can:delete-product');
    });

    Route::prefix('slider')->group(function () {
        Route::get('/', [AdminSliderController::class, 'index'])->name('slider.index')->middleware('can:list-slider');
        Route::get('/create', [AdminSliderController::class, 'create'])->name('slider.create')->middleware('can:add-slider');
        Route::post('/store', [AdminSliderController::class, 'store'])->name('slider.store');
        Route::get('/edit/{id}', [AdminSliderController::class, 'edit'])->name('slider.edit')->middleware('can:edit-slider');
        Route::post('/update/{id}', [AdminSliderController::class, 'update'])->name('slider.update');
        Route::get('/delete/{id}', [AdminSliderController::class, 'delete'])->name('slider.delete')->middleware('can:delete-slider');
    });

    Route::prefix('setting')->group(function () {
        Route::get('/', [AdminSettingController::class, 'index'])->name('setting.index')->middleware('can:list-setting');
        Route::get('/create', [AdminSettingController::class, 'create'])->name('setting.create')->middleware('can:add-setting');
        Route::post('/store', [AdminSettingController::class, 'store'])->name('setting.store');
        Route::get('/edit/{id}', [AdminSettingController::class, 'edit'])->name('setting.edit')->middleware('can:edit-setting');
        Route::post('update/{id}', [AdminSettingController::class, 'update'])->name('setting.update');
        Route::get('delete/{id}', [AdminSettingController::class, 'delete'])->name('setting.delete')->middleware('can:delete-setting');
    });

    Route::prefix('user')->group(function () {
        Route::get('/', [AdminUserController::class, 'index'])->name('user.index')->middleware('can:list-user');
        Route::get('/create', [AdminUserController::class, 'create'])->name('user.create')->middleware('can:add-user');
        Route::post('/store', [AdminUserController::class, 'store'])->name('user.store');
        Route::get('/edit/{id}', [AdminUserController::class, 'edit'])->name('user.edit')->middleware('can:edit-user');
        Route::post('/update/{id}', [AdminUserController::class, 'update'])->name('user.update');
        Route::get('/delete/{id}', [AdminUserController::class, 'delete'])->name('user.delete')->middleware('can:delete-user');
    });

    Route::prefix('role')->group(function () {
        Route::get('index', [AdminRoleController::class, 'index'])->name('role.index')->middleware('can:list-role');
        Route::get('create', [AdminRoleController::class, 'create'])->name('role.create')->middleware('can:add-role');
        Route::post('store', [AdminRoleController::class, 'store'])->name('role.store');
        Route::get('/edit/{id}', [AdminRoleController::class, 'edit'])->name('role.edit')->middleware('can:edit-role');
        Route::post('/update/{id}', [AdminRoleController::class, 'update'])->name('role.update');
        Route::get('delete/{id}', [AdminRoleController::class, 'delete'])->name('role.delete')->middleware('can:delete-role');
    });

    Route::prefix('permission')->group(function () {
        Route::get('/create', [AdminPermissionController::class, 'create'])->name('permission.create')->middleware('can:add-permission');
        Route::post('/store', [AdminPermissionController::class, 'store'])->name('permission.store');
    });
});




//Front-end route
Route::get("/", [HomeController::class, 'index'])->name('home.index');
Route::prefix('product')->group(function () {
    Route::get('detail/{id}', [CustomerProductContoller::class, 'productDetail'])->name('product.detail');
});
Route::get("category/{slug}/{id}", [CustomerCategory::class, 'index'])->name('category.product');

//Cart's route
Route::get('product/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('product.add-to-cart');
Route::get('product/show-cart', [CartController::class, 'showCart'])->name('product.show-cart');
Route::get('product/update-cart', [CartController::class, 'updateCart'])->name('product.update-cart');
