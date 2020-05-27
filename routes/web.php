<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

// Quick way to clear application cache
Route::get('/clear-cache', function() {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    return redirect('/');
});


// Change website's language
Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});


Route::get('/', 'IndexController@welcome')->name('home');
Route::get('/about','IndexController@about' );
Route::get('/contact', 'IndexController@contact');


Route::group(['middleware' => 'auth'], function () {
    // User's profile routes
    Route::get('/profile', 'UserController@show');
    Route::get('/profile/edit', 'UserController@edit'); // TODO
    Route::put('/profile', 'UserController@update');    // TODO

    Route::get('/user/role/{user}', 'UserController@editRole')->name('user.editRole');
    Route::put('/user/role/{user}', 'UserController@updateRole')->name('user.updateRole');

    Route::post('/user/score/{exam}', 'UserController@saveScore')->name('user.saveScore');

    Route::resource('/user', 'UserController')->only([
        'index', 'destroy'
    ]);
});


// Laravel authentication's routes
Auth::routes();