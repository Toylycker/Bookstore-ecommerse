<?php

use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ProductController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Route::controller(ProductController::class)->group(function () {
    Route::get('/product/{id}', 'show')
        ->name('product')
        ->where('id', '[0-9]+');

    Route::get('/category/{id}/products', 'category')
        ->name('category.products')
        ->where('id', '[0-9]+');

    Route::get('/author/{id}/products', 'author')
        ->name('author.products')
        ->where('id', '[0-9]+');

    Route::get('/publisher/{id}/products', 'publisher')
        ->name('publisher.products')
        ->where('id', '[0-9]+');

    Route::get('/brand/{id}/products', 'brand')
        ->name('brand.products')
        ->where('id', '[0-9]+');

    Route::get('/search', 'search')
        ->name('search');
});


//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

//require __DIR__.'/auth.php';
