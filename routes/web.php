<?php
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\IndexHomeController;

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
    return view('auth.login');
});

Route::resource('/products', ProductController::class)->middleware('auth');
Route::resource('/orders', OrderController::class)->middleware('auth');

Auth::routes();

Route::get('/home', [IndexHomeController::class, 'index'])->name('home2');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [IndexHomeController::class, 'index'])->name('home');
});
