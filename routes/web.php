<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TransactionsController;
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

/* Route::get('/', function () {
    return view('welcome');
}); */

//Experimental Code :
Route::get('generate', function (){
    \Illuminate\Support\Facades\Artisan::call('storage:link');
    echo 'ok';
});

//Home Actions:
Route::get('/', [HomeController::class, 'index']);

Route::get('/shop', [CartController::class, 'shopview']);

Route::get('/shop/details/{id}', [CartController::class, 'shopdetailview']);

Route::get('/single-product', function () {
    return view('user.single-product');
});

//Cart Actions : 
Route::get('/cart', [CartController::class, 'cartview']);

Route::post('/addtocart', [CartController::class, 'addtocart']);

Route::post('/updatecart', [CartController::class, 'updatecart']);

Route::post('/deletecart', [CartController::class, 'deletecart']);

//Checkout Process :
Route::get('/checkout', [CartController::class, 'checkoutview']);

Route::post('/checkout/proses', [CartController::class, 'checkout']);

//Transaction History Actions
Route::get('/history/{id}', [CartController::class, 'history']);

Route::get('/show-va/{id}', [CartController::class, 'showva']);

Route::get('/show-va/pay/{id}', [CartController::class, 'pay']);

Route::get('/receive/{id}', [CartController::class, 'receive']);

Route::get('/check', [CartController::class, 'checkPembayaran']);

Route::get('/about', function () {
    return view('user.about');
});

//Admin Home
Route::get('/admin-area', [AdminController::class, 'index']);

//Account Actions :  
Route::get('/admin-area/account', [AkunController::class, 'index']);

Route::post('/admin-area/account/add', [AkunController::class, 'simpan']);

Route::get('/admin-area/account/edit/{id}', [AkunController::class, 'edit']);

Route::post('/admin-area/account/edit/update/{id}', [AkunController::class, 'update']);

Route::get('/admin-area/account/delete/{id}', [AkunController::class, 'delete']);

//Order Actions
Route::get('/admin-area/orders', [TransactionsController::class, 'orderview']);

Route::post('/admin-area/order/details', [TransactionsController::class, 'bayarpesanan']);

Route::get('/admin-area/orders/cancel/{id}', [TransactionsController::class, 'orderbatal']);

//Menu Actions :
Route::get('/admin-area/menu', [MenuController::class, 'index']);

Route::post('/admin-area/menu/add', [MenuController::class, 'simpan']);

Route::get('/admin-area/menu/edit/{id}', [MenuController::class, 'edit']);

Route::post('/admin-area/menu/edit/update/{id}', [MenuController::class, 'update']);

Route::get('/admin-area/menu/delete/{id}', [MenuController::class, 'delete']);

//Transactions Area :
Route::get('/admin-area/transactions', [TransactionsController::class, 'index']);

Route::post('/admin-area/transactions/pay', [TransactionsController::class, 'prosesbayarpesanan']);

Route::get('/admin-area/transactions/send/{id}', [TransactionsController::class, 'kirimbarang']);

//Login Actions :
Route::get('/login', [LoginController::class, 'index']);

Route::post('/login/enter', [LoginController::class, 'loginActions']);

Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/signup', [LoginController::class, 'signup']);

Route::post('/signup/submit', [LoginController::class, 'signupactions']);