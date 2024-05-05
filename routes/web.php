<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::controller(AdminController::class)->middleware(['auth'])->group(function () {

    Route::get('/dashboard', 'index')->name('dashboard');
    Route::get('/profile', 'profile');
    Route::get('/home', 'dashboard')->name('home');
    Route::get('/change-pass', 'change_pass')->name('home');
});
Route::resource('banner',BannerController::class)->middleware(['auth']);


Route::get('logout', function () {

    Auth::logout();
});
require __DIR__ . '/auth.php';
