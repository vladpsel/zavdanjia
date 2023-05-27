<?php

use App\Http\Controllers\SecurityController;
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
})->name('app.home');

Route::match(['get', 'post'], 'login', [SecurityController::class, 'login'])->name('login');
Route::match(['get', 'post'], 'register', [SecurityController::class, 'register'])->name('register');
Route::get('logout', [SecurityController::class, 'logout'])->name('logout');
