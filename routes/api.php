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
Route::group(['middleware' => 'auth', 'namespace' => 'Resources'], function () {
    Route::post('/tasks', 'TasksController@store');
    Route::patch('/tasks/{task}', 'TasksController@update');
    Route::delete('/tasks/{task}', 'TasksController@destroy');

    Route::post('/tasks/{task}/bids', 'BidsController@store');
    Route::patch('/tasks/{task}/bids/{bid}', 'BidsController@update');
    Route::delete('/tasks/{task}/bids/{bid}', 'BidsController@destroy');

    Route::post('/users', 'UsersController@store');
    Route::patch('/users/{user}', 'UsersController@update');
    Route::delete('/users/{user}', 'UsersController@destroy');
});
