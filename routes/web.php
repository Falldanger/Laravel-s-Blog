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
//     return view('welcome');
// });

Route::get('/','IndexController@index')->name('user.index');

//
Route::get('article/{id}','IndexController@show')->name('articleShow');

Route::get('page/add','IndexController@add');

Route::post('page/add','IndexController@store')->name('articleStore');

Route::delete('page/delete/{article}',function(\App\Article $article){

	//$article_tmp = \App\Article::where('id',$article)->first();
	//dd($article);
	$article->delete();
	return redirect('/');

})->name('articleDelete');

Route::get('article/{id}/edit','IndexController@edit')->name('articleEdit');

Route::get('page/{post}','IndexController@update')->name('articleUpdate');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');