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
Route::get('/redirect',[\App\Http\Controllers\HomeController::class,'redirect'])->middleware('auth','verified');
Route::get('/detail/{id}',[\App\Http\Controllers\HomeController::class,'detail']);

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

    Route::get('/getAllOrder',[\App\Http\Controllers\OrderController::class,'getAllOrder']);
    Route::get('/Paid/{id}',[\App\Http\Controllers\OrderController::class,'Paid']);
    Route::get('/UnPaid/{id}',[\App\Http\Controllers\OrderController::class,'UnPaid']);
    Route::get('/Shipping/{id}',[\App\Http\Controllers\OrderController::class,'Shipping']);
});


Route::post('/add_shoppingCart/{id}',[\App\Http\Controllers\ShoppingCartController::class,'add_shoppingCart']);
Route::get('/show_shopping_cart',[\App\Http\Controllers\ShoppingCartController::class,'show_shopping_cart']);
Route::get('/plus/{id}',[\App\Http\Controllers\ShoppingCartController::class,'plus']);
Route::get('/minus/{id}',[\App\Http\Controllers\ShoppingCartController::class,'minus']);
Route::get('/delete/{id}',[\App\Http\Controllers\ShoppingCartController::class,'delete']);
Route::get('/summary',[\App\Http\Controllers\ShoppingCartController::class,'summary']);



Route::get('/cash_order',[\App\Http\Controllers\OrderController::class,'cash_order']);
Route::post('/stripe',[\App\Http\Controllers\OrderController::class,'stripe'])->name('stripe');
Route::get('/success', [\App\Http\Controllers\OrderController::class, 'stripeSuccess'])->name('stripeSuccess');
Route::get('/404', [\App\Http\Controllers\OrderController::class, 'stripeCancel'])->name('stripeCancel');
Route::get('/getOrderForCustomer', [\App\Http\Controllers\OrderController::class, 'getOrderForCustomer']);
Route::get('/print_pdf/{id}', [\App\Http\Controllers\OrderController::class, 'print_pdf']);
