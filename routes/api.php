<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


/*
 * API Routes that requires authentication to process. Otherwise, redirected
 * to login page.
 */
Route::group(['middleware' => 'auth'], function () {
    Route::post('/tasks', 'Resources\TasksController@store');
    Route::patch('/tasks/{task}', 'Resources\TasksController@update');
    Route::delete('/tasks/{task}', 'Resources\TasksController@destroy');

    Route::post('/tasks/{task}/bids', 'Resources\BidsController@store');
    Route::patch('/tasks/{task}/bids/{bid}', 'Resources\BidsController@update');
    Route::delete('/tasks/{task}/bids/{bid}', 'Resources\BidsController@destroy');

    Route::post('/users', 'Resources\UsersController@store');
    Route::patch('/users/{user}', 'Resources\UsersController@update');
    Route::delete('/users/{user}', 'Resources\UsersController@destroy');
});
