<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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
//     return view('Admin');
// });
Route::get('/',[AdminController::class,'login']);
Route::post('/adminlogin',[AdminController::class,'adminlogin']);
Route::get('/dashboard', [AdminController::class, 'dashboard']);
Route::get('/logout', [AdminController::class, 'logout']);


Route::get('/add_categoryform', [AdminController::class, 'add_categoryform']);
Route::post('/store_categories', [AdminController::class, 'store_categories']);
Route::get('/add_stock', [AdminController::class, 'add_stock']);
Route::post('/store_stock', [AdminController::class, 'store_stock']);

Route::post('/register', [AdminController::class, 'register']);


Route::get('/front-end', [AdminController::class, 'front_end']);
Route::get('/add_cart', [AdminController::class, 'add_cart']);