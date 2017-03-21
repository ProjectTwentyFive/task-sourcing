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
| Example:
| Controller => TaskController
| Eloquent Model => Task
| Migration => create_tasks_table
*/


Route::group(['middleware' => 'auth'], function () {
    Route::get('/tasks/create', 'Resources\TasksController@create');
    Route::get('/tasks/{task}/edit', 'Resources\TasksController@edit');
});

/*
 * Unauthenticated API Routes should be placed here.
 */
Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/tasks', 'Resources\TasksController@index');
Route::get('/tasks/{task}', 'Resources\TasksController@show');
Route::get('/tasks/{task}/bids/{bid}', 'Resources\BidsController@show');

Route::get('/users/{user}', 'Resources\UsersController@show');
Route::get('/users', 'Resources\UsersController@index');

// Placing these requests here for now so that we can access them without authentication
Route::delete('/users/{user}', 'Resources\UsersController@destroy')->name('user.destroy');
