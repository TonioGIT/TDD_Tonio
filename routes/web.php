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

//Route::get('/projects', function () {
//    return view ('projects');
//});





Route::get('/projects', 'ProjectsController@getProjects' );

Route::get('/projectsedit/{id}', 'ProjectsController@getDetails');

Route::get('/projectmodif/{id}', 'ProjectsController@getDetails2')->middleware('auth');
Route::post('/projectmodif/{id}', 'ProjectsController@publish')->middleware('auth');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
