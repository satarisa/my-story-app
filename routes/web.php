<?php

use App\Http\Controllers\AdminViewController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
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

Route::post('/search', [UserViewController::class, 'search']);
Route::get('/browse', [UserViewController::class, 'browse']);
Route::get('/about', [UserViewController::class, 'about']);

Route::get('/show-book/{id}', [UserViewController::class, 'show']);
Route::post('/show-book', [UserViewController::class, 'store'])->name('book.review');
Route::put('/show-book/{id}', [UserViewController::class, 'update'])->name('review.update');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::middleware('typeisexists')->group(function(){
    Route::get('/type/{type}', [UserViewController::class, 'type']);
});

Route::middleware('countryisexists')->group(function(){
    Route::get('/country/{country}', [UserViewController::class, 'country']);
});

Route::middleware('genreisexists')->group(function(){
    Route::get('genre/{genre}', [UserViewController::class, 'genre']);
});

Route::middleware('auth')->group(function() {
    Route::middleware('admin')->group(function() {
        Route::get('/menuadmin', [AdminViewController::class, 'index']);
        Route::resource('book', BookController::class);
        Route::resource('user', UserController::class);
    });
    
    Route::middleware('userlogin')->group(function() {
        Route::resource('profile', ProfileController::class);
    });
});