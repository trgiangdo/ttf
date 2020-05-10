<?php

use Illuminate\Support\Facades\Artisan;
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

Route::get('/clear-cache', function() {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    return redirect('/');
});


Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});


Route::get('/', 'IndexController@welcome')->name('home');

Route::get('/about','IndexController@about' );
Route::get('/contact', 'IndexController@contact');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile', 'IndexController@profile');

    Route::resource('/profile', 'UserController')->only([
        'edit', 'update', 'destroy'
    ]);


    Route::resource('/blog', 'BlogController')->only([
        'index', 'show'
    ]);

    Route::resource('/blog', 'BlogController')->only([
        'create', 'store'
    ])->middleware('can:create, \App\Blog');

    Route::resource('/blog', 'BlogController')->only([
        'edit', 'update'
    ])->middleware('can:update, blog');

    Route::resource('/blog', 'BlogController')->only([
        'destroy'
    ])->middleware('can:forceDelete, blog');
});


Auth::routes();