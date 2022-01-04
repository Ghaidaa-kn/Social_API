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


Route::get('/clouser', function () {
    return "Hi from Clouser"; // OR : <h1> Hi from Clouser </h2>
});

Route::get('/para/{id}/{author}', function ($id , $author) {
    return " The post with <h2>" . $id . '</h2> has author name <h2>' . $author . '</h2>';
}); 


Route::get('/posts','DashboardController@friendsPosts')->name('posts.index');
Route::get('/posts/create' , 'PostsController@create')->name('posts.create');
Route::post('/posts' , 'PostsController@store')->name('posts.store');
Route::get('/posts/{id}','PostsController@show')->name('posts.show');
Route::get('/posts/{id}/edit','PostsController@edit')->name('posts.edit');
Route::post('/posts/{id}','PostsController@update')->name('posts.update');
Route::get('/posts/{id}/destroy','PostsController@destroy')->name('posts.destroy');
Route::get('/users','DashboardController@allUsers');
//friends
Route::get('/addFriend/{id}',
	'DashboardController@addFriend');
Route::get('/getFriends' , 'DashboardController@getFriends');
Route::get('/removeFriend/{id}' ,
	'DashboardController@removeFriend');

Route::get('/request/{id}' , 'ReqController@request');
Route::get('/getRequests' , 'ReqController@getRequests');
Route::get('/deleteReq/{id}' , 'ReqController@deleteReq');
Route::get('/cancelReq/{id}' , 'ReqController@cancelReq');




Route::post('/comment/{id}' , 'PostsController@createComment');
//Route::get('/test/{id}' , 'PostsController@testcomment');
Route::get('/visit/{id}' , 'DashboardController@getUserPosts');



Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/ghaidaa' , 'UserCont@user');

