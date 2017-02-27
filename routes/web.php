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


// Laravel Flow
// Controller => TaskController
// Eloquent Model => Task
// Migration => create_tasks_table

Route::get('/tasks', 'TasksController@index');
Route::get('/tasks/create', 'TasksController@create');
Route::post('/tasks', 'TasksController@store');
Route::get('/tasks/{task}', 'TasksController@show');
Route::get('/tasks/{task}/edit', 'TasksController@edit');
Route::patch('/tasks/{task}', 'TasksController@update');
Route::delete('/tasks/{task}', 'TasksController@destroy');

Route::post('/tasks/{task}/bids', 'BidsController@store');

Auth::routes();

Route::get('/home', 'HomeController@index');

