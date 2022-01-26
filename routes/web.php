<?php

use App\Http\Controllers\Admin\DashboardController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function () {
    Route::get('/login', 'Auth\Admin\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\Admin\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Auth\Admin\AdminLoginController@logout')->name('admin.logout');

    Route::middleware('auth:admin')->namespace('Admin')->group(function () {
        Route::get('/', 'DashboardController@index')->name('admin.dashboard');
        Route::resource('/category', 'CategoryController'); // Categories
        Route::post('/category-datatable', 'CategoryController@datatable')->name('admin.category.datatable'); // Category Datatable
        Route::resource('/post', 'PostController'); // Posts
        Route::post('/post-datatable', 'PostController@datatable')->name('admin.post.datatable'); // Post Datatable
    });
});
