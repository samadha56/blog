<?php

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

Route::get('/', 'Site\IndexController@index')->name('site.index');
Route::get('/category/{category}', 'Site\CategoryController@show')->name('site.category.show');
Route::get('/post/{post}', 'Site\PostController@show')->name('site.post.show');
Route::post('/comments', 'Site\CommentController@store')->name('site.comments.store')->middleware('throttle:3,1');
Route::get('/page/{page}', 'Site\PageController@show')->name('site.page.show');

// Login and Register Routes
Auth::routes(['login' => false, 'register' => false]);
// Route::get('/home', [App\Http\Controllers\Dashboard\HomeController::class, 'index'])->name('home');

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
        Route::resource('/page', 'PageController'); // Pages
        Route::post('/page-datatable', 'PageController@datatable')->name('admin.page.datatable'); // Page Controller
        Route::get('/config', 'ConfigController@index')->name('admin.config.index');
        Route::post('/config', 'ConfigController@update')->name('admin.config.update');
        Route::post('/upload-image', 'UploadController@uploadImage')->name('admin.upload.image');
    });
});
