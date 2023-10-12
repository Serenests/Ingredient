<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\orderController;
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
    return view('welcome');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/order',[orderController::class,'toView']);

    //Route::get('/order',[orderController::class,'showname']);

    Route::get('/order',[orderController::class,'orderlist']);

    Route::post('/order/add', [orderController::class, 'getOrder'])->name('getOrder');

    Route::get('/order/delete/{id}', [orderController::class, "deleteList"])->name("order.delete");

    Route::get('/order/edit/{id}/{amount}',[orderController::class,'edit'])->name('order.edit');

    Route::post('/order/update', [orderController::class, "update"])->name("order.update");

    Route::get('/get-names/{typeId}', [OrderController::class, 'getNames']);

});
