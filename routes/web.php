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

Route::get('/', 'App\Http\Controllers\CourseController@index')->name('kurs.index');
Route::get('/kurs/{course}', 'App\Http\Controllers\CourseController@show')->name('single-course-show');
Route::get('/backend', 'App\Http\Controllers\CategoryController@backendCourses')->name('backend-courses');
Route::get('/fullstack', 'App\Http\Controllers\CategoryController@fullstackCourses')->name('fullstack-courses');
Route::get('/frontend', 'App\Http\Controllers\CategoryController@frontendCourses')->name('frontend-courses');
// izmenjeno za besplatan sadrzaj

Route::get('/besplatan-materijal', 'App\Http\Controllers\CourseController@besplatanMaterijal')->name('besplatan.materijal');

////////////
Route::get('/preuzimanje-placanje', 'App\Http\Controllers\SiteController@preuzimanjePlacanje')->name('preuzimanje-placanje');
//dodato review
Route::get('/utisci-komentari', 'App\Http\Controllers\ReviewController@index')->name('utisci');
Route::post('/utisci-komentari/dodaj-utisak', 'App\Http\Controllers\ReviewController@store')->name('review.create');
///////////////

Route::get('kurs/programski-jezik/{language}', 'App\Http\Controllers\CourseController@language')->name('course-language');
Route::get('kurs/framework/{framework}', 'App\Http\Controllers\CourseController@framework')->name('course-framework');

Auth::routes();

Route::post('preuzimanje-placanje/dodela-prava', 'App\Http\Controllers\UserController@grantAccessPayPal')->name('users-access-paypal');
///////////////////
Route::post('preuzimanje-placanje/dodela-prava/pojedinacan-kurs', 'App\Http\Controllers\UserController@grantAccessCoursePayPal')->name('course-access-paypal');
////////////////////////////
Route::middleware(['auth', 'admin'])->group( function (){

    Route::get('/users', 'App\Http\Controllers\UserController@index')->name('users-index');
  
    Route::post('users/user-list/grant-access/{user}', 'App\Http\Controllers\UserController@grantAccess')->name('users-access');
/////////////
    Route::put('users/user-list/grant-access/single-course/{user}', 'App\Http\Controllers\UserController@grantAccessToCourse')->name('grant.courses.access');
////////////////

    Route::post('users/user-list/deny-access/{user}', 'App\Http\Controllers\UserController@denyAccess')->name('users-deny-access');
    Route::get('/users_edit_profile', [ 'as' => 'users_edit_profile', 'uses' => 'App\Http\Controllers\UserController@edit']);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});





