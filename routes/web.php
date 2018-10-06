<?php

use App\Category;

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
	$categories=Category::all();
	return view('welcome',compact('categories'));
});

Route::group(['middleware' => ['auth','verified']], function() {

	Route::get('/post','PostController@create')->name('post');
	Route::post('/post','PostController@store')->name('add_post');

	Route::get('/myaccount', 'HomeController@index')->name('myaccount');

	Route::get('/home', 'HomeController@index')->name('home');

	Route::post('/submit-bid','BidController@store')->name('submit_bid');

	// Route::get('/comment/{post_id}','CommentController@index')->name('comment');
	Route::post('/comment/{post_id}','CommentController@store')->name('add_comment');

	Route::post('/reply/{comment_id}','ReplyController@store')->name('add_reply');

	Route::get('/like/{post_id}','BidController@toggkeLike')->name('like');

});


Route::get('/all-ads','PostController@index')->name('all_ads');

Route::get('/ads/{name}','CategoryController@index')->name('cat_ads');

Route::post('/search-ads','PostController@filter')->name('search_ads');


Route::get('/post/{id}','PostController@show')->name('single_post');

Auth::routes(['verify' => true]);

Route::get('image-file/{filename}',function($filename){
	$path = storage_path() . '\uploads\img\\' . $filename;

	$file = File::get($path);
	$type = File::mimeType($path);

	$response = Response::make($file, 200);
	$response->header("Content-Type", $type);

	return $response;
})->name('imageFile');