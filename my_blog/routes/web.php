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

// Route::get('/', function () {
//     return view('blog.index');
// });
// Route::get('/show', function () {
//     return view('blog.show');
// });

Route::group(['middleware'=>['web']], function () {
	Route::resource('blog', 'BlogController');
});

Route::get('/category/{category_id}', [
	'uses' => 'BlogController@category',
	'as' => 'category'
]);

Route::post('blog', 'BlogController@comment');

// Route::get('/blog/{post}', [
// 	'uses' => 'BlogController@show',
// 	'as' => 'blog.show' 
// ]);

Route::get('login', 'LoginController@getLogin');

Route::post('login',['uses' => 'LoginController@postLogin', 'as' => 'login']);

Route::get('logout', 'AdminController@getLogout');

// Route::get('register', 'LoginController@getRegister');

// Route::group(['middleware'=>['web']], function () {
// 	Route::resource('login', 'LoginController');
// });

// Auth::routes();

/* Route Admin */

Route::get('/admin', 'AdminController@dashboard');

/* Route Admin Blog */

Route::get('/admin/blog', 'AdminController@blogAll');

Route::get('/admin/blog/create', 'AdminController@blogCreate');

Route::post('/admin/blog/create', 'AdminController@blogStore');

Route::get('/admin/blog/edit/{post_id}', 'AdminController@blogEdit');

Route::post('/admin/blog/edit/{post_id}', 'AdminController@blogUpdate');


/* Route Admin Category */

Route::get('/admin/category', 'AdminController@categoryAll');

Route::get('/admin/category/create', 'AdminController@categoryCreate');

Route::post('/admin/category/create', 'AdminController@categoryStore');

Route::get('/admin/category/edit/{category_id}', 'AdminController@categoryEdit');

Route::post('/admin/category/edit/{category_id}', 'AdminController@categoryUpdate');
