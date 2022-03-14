<?php

use App\Http\Controllers\CVController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobExperienceController;
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

Route::get('/api/fetch-countries', [GeneralController::class, 'fetch_countries'])->name('fetch.countries');
Route::get('/api/country/{country}/fetch-states', [GeneralController::class, 'fetch_states'])->name('fetch.states');

Route::group(['middleware' => ['auth', 'verified']], function() {
    // Route::group(['middleware' => ['is_profile_complete']], function() {
        Route::get('/', [HomeController::class, 'index'])->name('home');
        Route::resource('cv', CVController::class)->parameter('cv', 'cv:uuid');
        Route::resource('cv/{cv:uuid}/experience', JobExperienceController::class)->only(['create', 'update']);
        // Route::post('/cv/{cv:uuid}/{type}', [CVController::class, 'update'])->name('update.cv.data');

        Route::resource('user', UserContorller::class);

        Route::get('/cv/{cv:uuid}/contact-details', [CVController::class, 'contact_details'])->name('cv.contact-details');
        Route::post('/cv/{cv:uuid}/contact-details', [CVController::class, 'update_contact_details'])->name('cv.contact-details.update');

        Route::get('/cv/{cv:uuid}/secondary-education', [CVController::class, 'secondary_education'])->name('cv.secondary-education');
        Route::post('/cv/{cv:uuid}/secondary-education', [CVController::class, 'create_secondary_education'])->name('cv.secondary-education.create');
        Route::post('/cv/{cv:uuid}/secondary-education/{secondary_education}', [CVController::class, 'update_secondary_education'])->name('cv.secondary-education.update');
        Route::get('/cv/{cv:uuid}/secondary-education/{secondary_edu}', [CVController::class, 'delete_secondary_education'])->name('cv.secondary-education.delete');

        Route::get('/cv/{cv:uuid}/tertiary-institution', [CVController::class, 'tertiary_institution'])->name('cv.tertiary-institution');
        Route::post('/cv/{cv:uuid}/tertiary-institution', [CVController::class, 'create_tertiary_institution'])->name('cv.tertiary-institution.create');
        Route::post('/cv/{cv:uuid}/tertiary-institution/{tertiary_edu}', [CVController::class, 'update_tertiary_institution'])->name('cv.tertiary-institution.update');
        Route::get('/cv/{cv:uuid}/tertiary-education/{tertiary_edu}', [CVController::class, 'delete_tertiary_institution'])->name('cv.tertiary-institution.delete');

        Route::get('/cv/{cv:uuid}/employement-history', [CVController::class, 'employement_history'])->name('cv.employement-history');
        Route::post('/cv/{cv:uuid}/employement-history', [CVController::class, 'update_employement_history'])->name('cv.employement-history.update');

        Route::post('user/password', [UserContorller::class, 'update_password'])->name('update.password');
        Route::post('user/image', [UserContorller::class, 'update_image'])->name('update.image');
    // });
});

