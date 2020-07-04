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
Route::resource('/articles', 'ArticleController');

Route::get('/', function () {
    return view('welcome');
    return redirect('articles/create');
});

Auth::routes();

Route::get('/', 'ArticleController@index')->name('login');
Route::post('/login', 'ArticleController@login');

Route::group(['middleware' => ['auth']], function() {

    Route::get('/logout', function() {
        Auth::logout();
        return redirect()->route('/');
    });
    
    //Route::post('/articles/create', 'ArticleController@store')->name('create');
    
    Route::get('/articles', 'ArticleController@articles')->name('articles');
    
    Route::post('/articles/create','ArticleController@queryBlog');
    
    Route::delete('articles/id', 'ArticleController@destroy')->name('destroy');
});

