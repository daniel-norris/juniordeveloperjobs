<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdvertController;

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

Route::get('/', [AdvertController::class, 'index'])->name('home');

Route::get('/jobs', [AdvertController::class, 'search']);

Route::get('/post', [AdvertController::class, 'post'])->middleware('auth')->name('post');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// Route::post('/login', [AuthController::class, 'authenticate']);

// Route::get('/register', [RegisterController::class, 'create']);
// Route::post('/register', [RegisterController::class, 'store']);

// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');