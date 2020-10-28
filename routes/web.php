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

/*Route::get('/', function () {
    return view('/home');
});*/
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
    Route::resource('teachers', App\Http\Controllers\TeachersController::class);
    Route::resource('communities', App\Http\Controllers\CommunitiesController::class);
    Route::resource('pupils', App\Http\Controllers\PupilsController::class);
    Route::resource('institutions', App\Http\Controllers\InstitutionsController::class);
    Route::resource('groups', App\Http\Controllers\GroupsController::class);
    Route::resource('countries', App\Http\Controllers\CountriesController::class);
    Route::resource('regions', App\Http\Controllers\RegionsController::class);
    Route::resource('districts', App\Http\Controllers\DistrictsController::class);
    Route::resource('educationDegrees', App\Http\Controllers\EducationDegreesController::class);
    Route::resource('users', App\Http\Controllers\UsersController::class);
    /*Route::middleware('can:admin')->group(function () {

    });*/
});




