<?php

use App\Http\Controllers\AuthController;
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

Route::get('/', function () {
    return view('index');
})->name('home');

Route::post('products/search', [\App\Http\Controllers\ProductController::class, 'search'])->name('products.search');

Route::post('/products/sort', [\App\Http\Controllers\ProductController::class, 'SortByASC'])->name('products.SortByASC');
Route::post('/products/sort-desc', [\App\Http\Controllers\ProductController::class, 'SortByDESC'])->name('products.SortByDESC');
Route::post('/products/sort-by-price-desc', [\App\Http\Controllers\ProductController::class, 'sortByPriceDescending'])->name('products.sortByPriceDescending');
Route::post('/products/sort-by-price-asc', [\App\Http\Controllers\ProductController::class, 'sortByPriceAscending'])->name('products.sortByPriceAscending');
Route::get('/products/sort-by-category/{categoryId}', [\App\Http\Controllers\ProductController::class, 'sortByCategory'])->name('products.sortByCategory');
Route::get('products/sort-by-weight',[\App\Http\Controllers\ProductController::class,'sortByWeight'])->name('products.sortByWeight');


Route::prefix('admin')->name('admin.')->middleware(\App\Http\Middleware\AdminMiddleware::class)->group(function () {
    Route::resource('users', \App\Http\Controllers\UserController::class);
    Route::resource('orders', \App\Http\Controllers\OrderController::class);
    Route::resource('products', \App\Http\Controllers\ProductController::class);
    Route::resource('roles', \App\Http\Controllers\RoleController::class);
    Route::resource('order-products', \App\Http\Controllers\OrderProductController::class);
});


Route::middleware('guest')
    ->controller(AuthController::class)
    ->group(function () {
        Route::get('/register','showRegisterForm')->name('register');
        Route::get('/login','showLoginForm')->name('login');
        Route::post('/register_processing','register')->name('register_processing');
        Route::post('/login_processing','login')->name('login_processing');
    });
Route::post('/logout',[AuthController::class,'logout'])->name('logout')->middleware('auth');

Route::get('korzina',function ()
{
    $products = \App\Models\Product::query()->paginate();
    $orderProducts = \App\Models\OrderProduct::query()->paginate();
    $orders = \App\Models\Order::query()->paginate();
    return view('korzina',compact('products', 'orderProducts', 'orders'));
})->name('korzina');

Route::get('katalog',function ()
{
    $products = \App\Models\Product::query()->paginate();
    return view('katalog', compact('products'));
})->name('katalog');

Route::post('makeOrder',[\App\Http\Controllers\OrderController::class,'makeOrder'])->name('makeOrder');
Route::post('pdf', [\App\Http\Controllers\OrderProductController::class, 'pdf'])->name('pdf');
Route::post('/del/{id}', [\App\Http\Controllers\OrderProductController::class, 'destroyInKorzina'])->name('del');

Route::get('kartochka/{id}',[\App\Http\Controllers\ProductController::class,'kartohka'])->name('kartochka');
