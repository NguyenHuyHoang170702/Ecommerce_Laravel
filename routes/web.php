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

Route::get('/', [\App\Http\Controllers\HomeController::class,'index']);
Route::get('/redirect',[\App\Http\Controllers\HomeController::class,'redirect']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::group(['middleware' => ['admin']], function () {
    Route::get('/view_category', [\App\Http\Controllers\AdminController::class, 'view_category']);
    Route::post('/add_category', [\App\Http\Controllers\AdminController::class, 'add_category']);
    Route::get('/delete_category/{id}', [\App\Http\Controllers\AdminController::class, 'delete_category']);

    Route::get('/view_product',[\App\Http\Controllers\ProductController::class,'view_product']);
    Route::post('/add_product',[\App\Http\Controllers\ProductController::class,'add_product']);
    Route::get('/show_product',[\App\Http\Controllers\ProductController::class,'show_product']);
    Route::get('/delete_product/{id}',[\App\Http\Controllers\ProductController::class,'delete_product']);
    Route::get('/edit_product/{id}',[\App\Http\Controllers\ProductController::class,'edit_product']);
    Route::post('/updateProductConfirm/{id}',[\App\Http\Controllers\ProductController::class,'updateProductConfirm']);
});

Route::get('/detail/{id}',[\App\Http\Controllers\HomeController::class,'detail']);


