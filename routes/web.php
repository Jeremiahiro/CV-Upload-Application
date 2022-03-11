<?php

use App\Http\Controllers\CVController;
use App\Http\Controllers\UserContorller;
use Illuminate\Support\Facades\Auth;
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


Route::get('/cv', function () {
    return view('v1.user.cv');
});

Route::get('/cv/all', function () {
    return view('v1.user.cv_all');
});

Route::get('/cv/view', function () {
    return view('v1.user.cv_view');
});

Route::get('/cv/add', function () {
    return view('v1.user.addcv');
});

Route::get('/profile', function () {
    return view('v1.user.profile');
});

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth', 'verified']], function() {
    // Route::group(['middleware' => ['is_profile_complete']], function() {
        Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::resource('cv', CVController::class);
        Route::resource('user', UserContorller::class);
        Route::post('user/password', [UserContorller::class, 'update_password'])->name('update.password');
        Route::post('user/image', [UserContorller::class, 'update_image'])->name('update.image');
        // Route::post('/update/{type}', [App\Http\Controllers\CVController::class, 'update'])->name('update.cv.data');
    // });
});

