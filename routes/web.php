<?php

use App\Http\Controllers\AdminViewController;
use App\Http\Controllers\BookController;
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
Route::get('/menuadmin', [AdminViewController::class, 'index']);
Route::resource('book', BookController::class);
