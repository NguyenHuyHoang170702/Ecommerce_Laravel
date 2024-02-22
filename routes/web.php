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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('home.user');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redirect',[\App\Http\Controllers\HomeController::class,'redirect']);


Route::get('/view_category',[\App\Http\Controllers\AdminController::class,'view_category']);
Route::post('/add_category',[\App\Http\Controllers\AdminController::class,'add_category']);
Route::get('/delete_category/{id}',[\App\Http\Controllers\AdminController::class,'delete_category']);

Route::get('/view_product',[\App\Http\Controllers\AdminController::class,'view_product']);
Route::post('/add_product',[\App\Http\Controllers\AdminController::class,'add_product']);
