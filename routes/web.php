<?php

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

// Home Route
Route::get('/', 'PageController@index');

// Language Route
Route::get('/lang/{locale}', function ($locale) {
    session()->put('locale', $locale);
    return redirect()->back();
});

// User Route
Route::get('/search', 'PageController@search')->name('search');
Route::resource('post', 'PostController')->only(['show']);
Route::resource('category', 'CategoryController')->only(['show']);
Route::resource('tag', 'TagController')->only(['show']);
Route::resource('feedback', 'FeedbackController')->only(['create', 'store']);

// Auth Route
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// Administrator Route
Route::prefix('admin')->group(function () {
    Route::middleware('role:administrator')->group(function () {
        Route::resource('posts', 'PostController');
        Route::resource('categories', 'CategoryController');
        Route::resource('tags', 'TagController');
        Route::resource('users', 'UserController');
        Route::resource('roles', 'RoleController');
        Route::resource('feedbacks', 'FeedbackController');
        Route::post('/feedbacks/{id}/reply', 'FeedbackController@replyFeedback')->name('feedbacks.reply');
	});
});
