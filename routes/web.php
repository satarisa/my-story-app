<?php

use App\Http\Controllers\AdminViewController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserViewController;
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

// Route::get('/', function () {
//     return view('index');
// });

// Route::get('/menuadmin', function () {
//     return view('admin.menu');
// });

Route::get('/', [UserViewController::class, 'index']);
Route::get('/show-book/{id}', [UserViewController::class, 'show']);
Route::post('/show-book', [UserViewController::class, 'store'])->name('book.review');
Route::get('/menuadmin', [AdminViewController::class, 'index']);
Route::resource('book', BookController::class);
Route::resource('user', UserController::class);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);
