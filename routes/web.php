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
    return view('welcome');
});

Route::get('/para/{id}/{author}', function ($id , $author) {
    return " The post with <h2>" . $id . '</h2> has author name <h2>' . $author . '</h2>';
}); 

Route::get('/posts','PostsController@index')->name('posts.index');
Route::get('/posts/create' , 'PostsController@create')->name('posts.create');
Route::post('/posts' , 'PostsController@store')->name('posts.store');
Route::get('/posts/{id}','PostsController@show')->name('posts.show');
Route::get('/posts/{id}/edit','PostsController@edit')->name('posts.edit');
Route::post('/posts/{id}','PostsController@update')->name('posts.update');
Route::get('/posts/{id}/destroy','PostsController@destroy')->name('posts.destroy');


Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
