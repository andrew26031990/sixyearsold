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

Route::get('/userhelper', function () {
    return Userh::get_username();
});

Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'index'])->middleware('role:admin');
    Route::get('langChange', [App\Http\Controllers\UsersController::class, 'setUserLanguage']);
    Route::resource('teachers', App\Http\Controllers\TeachersController::class);
    Route::resource('communities', App\Http\Controllers\CommunitiesController::class);
    Route::resource('pupils', App\Http\Controllers\PupilsController::class);
    Route::resource('institutions', App\Http\Controllers\InstitutionsController::class);
    Route::resource('groups', App\Http\Controllers\GroupsController::class);
    Route::resource('countries', App\Http\Controllers\CountriesController::class)->middleware('role:admin');
    Route::resource('regions', App\Http\Controllers\RegionsController::class)->middleware('role:admin');
    Route::resource('districts', App\Http\Controllers\DistrictsController::class)->middleware('role:admin');
    Route::resource('educationDegrees', App\Http\Controllers\EducationDegreesController::class)->middleware('role:admin');
    Route::resource('users', App\Http\Controllers\UsersController::class)->middleware('role:admin');
    Route::get('getRegions/{id}', [App\Http\Controllers\RegionsController::class,'getRegions']);
    Route::get('getDistricts/{id}', [App\Http\Controllers\DistrictsController::class,'getDistricts']);
    Route::get('getInstitutions/{id}', [App\Http\Controllers\InstitutionsController::class,'getInstitutions']);
    Route::get('getGroups/{id}', [App\Http\Controllers\GroupsController::class,'getGroups']);
});




