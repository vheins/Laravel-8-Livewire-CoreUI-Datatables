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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', ['\App\Http\Controllers\HomeController', 'index'])->name('dashboard');

Route::prefix('backoff')->group(function () {
    Route::view('/users','backoff.user')->middleware('can:user-index')->name('backoff.user');
    Route::view('/roles','backoff.role')->middleware('can:role-index')->name('backoff.role');
    Route::view('/permissions','backoff.permission')->middleware('can:permission-index')->name('backoff.permission');
});
