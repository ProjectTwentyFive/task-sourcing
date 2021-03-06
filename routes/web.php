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
    Route::post('/tasks', 'Resources\TasksController@store');
    Route::patch('/tasks/{task}', 'Resources\TasksController@update');
    Route::delete('/tasks/{task}', 'Resources\TasksController@destroy')->name('task.destroy');
    Route::get('/tasks/create', 'Resources\TasksController@create')->name('task.create');
    Route::get('/tasks/{task}/edit', 'Resources\TasksController@edit');
    // this should be a post or a patch but Laravel gives a MethodNotAllowed error if it is anything but get
    Route::get('/tasks/{task}/status/{status}', 'Resources\TasksController@updateStatus')->name('tasks.updateStatus');

    Route::post('tasks/{task}/bids/{bid}/{selected}', 'Resources\BidsController@update')->name('bid.update');
    Route::post('/tasks/{task}/bids', 'Resources\BidsController@store');
    Route::patch('/tasks/{task}/bids/{bid}', 'Resources\BidsController@update');
    Route::delete('/bids/{bid}', 'Resources\BidsController@destroy')->name('bid.destroy');

    Route::get('/users', 'Resources\UsersController@index')->name('users.index');
    Route::get('/users/create', 'Resources\UsersController@create')->name('user.create');
    Route::delete('/users/{user}', 'Resources\UsersController@destroy')->name('user.destroy');
    Route::post('/users', 'Resources\UsersController@store')->name('user.store');
    Route::patch('/users/{user}', 'Resources\UsersController@update');
    Route::get('/profile', 'Resources\UsersController@profile')->name('user.profile');
    Route::get('/users/{user}/edit', 'Resources\UsersController@edit')->name('user.edit');

    Route::post('/generic-tasks', 'Resources\GenericTasksController@store');
    Route::patch('/generic-tasks/{genericTask}', 'Resources\GenericTasksController@update');
    Route::delete('/generic-tasks/{genericTask}', 'Resources\GenericTasksController@destroy')->name('generic-task.destroy');
    Route::get('/generic-tasks/create', 'Resources\GenericTasksController@create');
    Route::get('/generic-tasks/{genericTask}/edit', 'Resources\GenericTasksController@edit');

    Route::get('/tasks', 'Resources\TasksController@index')->name('tasks.index');
    Route::get('/tasks/{task}', 'Resources\TasksController@show');
    Route::get('/tasks/{task}/bids/{bid}', 'Resources\BidsController@show');
    Route::get('/users/{user}', 'Resources\UsersController@show');

    Route::get('/generic-tasks', 'Resources\GenericTasksController@index')->name('generic-tasks');

    Route::post('/logout', 'Auth\SessionsController@destroy')->name('logout');

    Route::get('/admin', 'AdminController@index')->name('admin');
});

/*
 * Unauthenticated API Routes should be placed here.
 */

// Authentication Routes
Route::get('/register', 'Auth\RegistrationController@create');
Route::post('/register', 'Auth\RegistrationController@store')->name('register');
Route::get('/login', 'Auth\SessionsController@create');
Route::post('/login', 'Auth\SessionsController@store')->name('login');

Route::get('/', 'HomeController@index')->name('home');
