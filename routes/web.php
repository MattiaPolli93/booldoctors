<?php

use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\GuestController;
use Illuminate\Http\Client\Request;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

/* Admin routes */
Route::prefix('admin')->name('admin.')->namespace('Admin')->middleware('auth')->group(function () {
    Route::resource('profile', 'UserController');
    Route::delete('services/{id}', 'ServiceController@destroy')->name('service.destroy');
    Route::get('messages', 'MessageController@showMessages')->name('messages');
    Route::get('comments', 'CommentController@showComments')->name('comments');
    Route::get('statistics', 'StatisticController@showStats')->name('statistics');
    Route::get('sponsor/{id}', 'PlanController@setPlan')->name('sponsor');
    Route::post('sponsor/{id}/checkout', 'PlanController@payPlan')->name('checkout');
    /* Route::resource('create', 'UserController'); */
    /* Route::resource('posts', 'PostController');
    Route::resource('tags', 'TagController'); */
    /* Route::delete('comments/{comment}', 'CommentController@destroy')->name('comments.destroy'); */
});

/* Guest routes */
Route::get('/', 'GuestController@index')->name('homepage');
Route::get('search', 'GuestController@searchDoctors')->name('search');
Route::get('doctor/{id}', 'GuestController@show')->name('show');
Route::post('doctor/{id}/store-message', 'GuestController@storeMessage')->name('doctor.store-message');
Route::post('doctor/{id}/store-comment', 'GuestController@storeComment')->name('doctor.store-comment');
