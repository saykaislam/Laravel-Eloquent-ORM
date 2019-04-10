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

Route::get('/', function () {
    return view('firstpage');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/insert-post','PostController@store');
Route::get('/all-posts', 'PostController@AllPost')->name('all.posts');
Route::get('/delete-post/{id}','PostController@DeletePost');
Route::get('/edit-post/{id}','PostController@EditPost');
Route::post('/update-post/{id}','PostController@UpdatePost');

Route::get('/password-change','HomeController@Password')->name('password.change');
Route::post('/update-password','HomeController@UpdatePass');

Route::get('/news-add','PostController@News')->name('news.add');
Route::post('/insert-news','PostController@InsertNews');
Route::get('/all-news', 'PostController@AllNews')->name('all.news');
Route::get('/delete-news/{id}','PostController@DeleteNews');
Route::get('/view-post/{id}','NewsController@ViewPost');