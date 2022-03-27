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


Route::get('/cv/d', function () {
    return view('v1.user.cv');
});

Route::get('/cv/all', function () {
    return view('v1.user.cv_all');
});

Route::get('/cv/add', function () {
    return view('v1.user.addcv');
});

Route::get('/profile', function () {
    return view('v1.user.profile');
});

Auth::routes(['verify' => true]);

Route::get('/api/fetch-countries', [GeneralController::class, 'fetch_countries'])->name('countries.list');
Route::get('/api/country/{country}/fetch-states', [GeneralController::class, 'fetch_states'])->name('states.list');
Route::get('/api/country/fetch-nigerian-states', [GeneralController::class, 'fetch_states_in_nigeria'])->name('states.list.in.nigeria');

Route::get('/api/secondary-qualification', [GeneralController::class, 'fetch_secondary_qualification'])->name('secondary.qualification.list');
Route::get('/api/secondary-subjects', [GeneralController::class, 'fetch_secondary_subjects'])->name('secondary.subjects.list');
Route::get('/api/secondary-grades', [GeneralController::class, 'fetch_secondary_grades'])->name('secondary.grades.list');

Route::get('/api/tertiray-institutions', [GeneralController::class, 'fetch_tertiary_institutions'])->name('tertiray.list');
Route::get('/api/tertiray-institutions/{tertiaryTypes}', [GeneralController::class, 'fetch_tertiary_institutions_by_type'])->name('tertiray.list.by.type');
Route::get('/api/tertiary-types', [GeneralController::class, 'fetch_tertiary_type'])->name('tertiary.type');
Route::get('/api/tertiary-qualification', [GeneralController::class, 'fetch_tertiary_qualification'])->name('tertiary.qualification');
Route::get('/api/tertiary-course', [GeneralController::class, 'fetch_tertiary_course'])->name('tertiary.course');
Route::get('/api/tertiary-course-type', [GeneralController::class, 'fetch_tertiary_course_type'])->name('tertiary.course.type');
Route::get('/api/tertiary-grade', [GeneralController::class, 'fetch_tertiary_grade'])->name('tertiary.grade');

Route::get('/api/professional-qualification-type', [GeneralController::class, 'fetch_professional_qualification_types'])->name('professional.qualification.type');
Route::get('/api/professional-institutions', [GeneralController::class, 'fetch_professional_insitutions'])->name('professional.institutions');

Route::get('/api/employment-roles', [GeneralController::class, 'fetch_employment_roles'])->name('employment.roles');
Route::get('/api/industry-sector', [GeneralController::class, 'fetch_industries'])->name('industry.list');


Route::group(['middleware' => ['auth', 'verified']], function() {
    // Route::group(['middleware' => ['is_profile_complete']], function() {
        Route::get('/', [HomeController::class, 'index'])->name('home');
        Route::resource('cv', CVController::class)->parameter('cv', 'cv:uuid');
        Route::resource('cv/{cv:uuid}/experience', JobExperienceController::class)->only(['create', 'update']);

        Route::resource('user', UserContorller::class);

        Route::get('/cv/{cv:uuid}/contact-details', [CVController::class, 'contact_details'])->name('cv.contact-details');
        Route::post('/cv/{cv:uuid}/contact-details', [CVController::class, 'update_contact_details'])->name('cv.contact-details.update');

        Route::get('/cv/{cv:uuid}/secondary-education', [CVController::class, 'secondary_education'])->name('cv.secondary-education');
        Route::post('/cv/{cv:uuid}/secondary-education', [CVController::class, 'create_secondary_education'])->name('cv.secondary-education.create');
        Route::get('/cv/{cv:uuid}/secondary-education/{secondary_education}/edit', [CVController::class, 'edit_secondary_education'])->name('cv.secondary-education.edit');
        Route::post('/cv/{cv:uuid}/secondary-education/{secondary_education}', [CVController::class, 'update_secondary_education'])->name('cv.secondary-education.update');
        Route::get('/cv/{cv:uuid}/secondary-education/{secondary_education}', [CVController::class, 'delete_secondary_education'])->name('cv.secondary-education.delete');

        Route::get('/cv/{cv:uuid}/tertiary-institution', [CVController::class, 'tertiary_institution'])->name('cv.tertiary-institution');
        Route::post('/cv/{cv:uuid}/tertiary-institution', [CVController::class, 'create_tertiary_institution'])->name('cv.tertiary-institution.create');
        Route::get('/cv/{cv:uuid}/tertiary-education/{tertiary_education}/edit', [CVController::class, 'edit_tertiary_institution'])->name('cv.tertiary-institution.edit');
        Route::post('/cv/{cv:uuid}/tertiary-institution/{tertiary_education}', [CVController::class, 'update_tertiary_institution'])->name('cv.tertiary-institution.update');
        Route::get('/cv/{cv:uuid}/tertiary-education/{tertiary_education}', [CVController::class, 'delete_tertiary_institution'])->name('cv.tertiary-institution.delete');

        Route::get('/cv/{cv:uuid}/professional-qualification', [CVController::class, 'professional_qualification'])->name('cv.professional-qualification');
        Route::post('/cv/{cv:uuid}/professional-qualification', [CVController::class, 'create_professional_qualification'])->name('cv.professional-qualification.create');
        Route::post('/cv/{cv:uuid}/professional-qualification/{qualification}', [CVController::class, 'update_professional_qualification'])->name('cv.professional-qualification.update');
        Route::get('/cv/{cv:uuid}/professional-qualification/{qualification}', [CVController::class, 'delete_professional_qualification'])->name('cv.professional-qualification.delete');

        Route::get('/cv/{cv:uuid}/nysc-details', [CVController::class, 'nysc_details'])->name('cv.nysc_details');
        Route::post('/cv/{cv:uuid}/nysc-details', [CVController::class, 'update_nysc_details'])->name('cv.nysc_details.update');

        Route::get('/cv/{cv:uuid}/employement-history/{type}', [CVController::class, 'employement_history'])->name('cv.employement_history');
        Route::post('/cv/{cv:uuid}/employement-history', [CVController::class, 'create_employement_history'])->name('cv.employement_history.create');
        Route::post('/cv/{cv:uuid}/employement-history/{employement}', [CVController::class, 'update_employement_history'])->name('cv.employement_history.update');
        Route::get('/cv/{cv:uuid}/employement-history/{employement}/delete', [CVController::class, 'delete_employement_history'])->name('cv.employement_history.delete');
        
        Route::get('/cv/{cv:uuid}/employement-role/{employement}', [CVController::class, 'employement_role'])->name('cv.employement_role');
        Route::post('/cv/{cv:uuid}/employement-role/{employement}', [CVController::class, 'create_employement_role'])->name('cv.employement_role.create');
        Route::post('/cv/{cv:uuid}/employement-role/{employement}/{role}', [CVController::class, 'update_employement_role'])->name('cv.employement_role.update');
        Route::get('/cv/{cv:uuid}/employement-role/delete/{role}', [CVController::class, 'delete_employement_role'])->name('cv.employement_role.delete');

        Route::get('/cv/{cv:uuid}/referees', [CVController::class, 'referee'])->name('cv.referee');
        Route::post('/cv/{cv:uuid}/referees', [CVController::class, 'create_referee'])->name('cv.referee.create');
        Route::post('/cv/{cv:uuid}/referees/{referee}', [CVController::class, 'update_referee'])->name('cv.referee.update');
        Route::get('/cv/{cv:uuid}/referees/{referee}', [CVController::class, 'delete_referee'])->name('cv.referee.delete');

        Route::get('/cv/{cv:uuid}/location-preference', [CVController::class, 'location_preference'])->name('cv.location_preference');
        Route::post('/cv/{cv:uuid}/location-preference', [CVController::class, 'update_location_preference'])->name('cv.location_preference.update');

        Route::get('/cv/{cv:uuid}/hobbies', [CVController::class, 'hobbies'])->name('cv.hobbies');
        Route::post('/cv/{cv:uuid}/hobbies', [CVController::class, 'update_hobbies'])->name('cv.hobbies.update');

        Route::post('user/password', [UserContorller::class, 'update_password'])->name('update.password');
        Route::post('user/image', [UserContorller::class, 'update_image'])->name('update.image');
    // });
});

