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

Route::middleware(['api'])->group(function () {
    /*
     * Menu
     */
    Route::get('/menu', 'Cms\PageController@getMenu');

    /*
     * Pages
     */
    Route::post('/pages/create', 'Cms\PageController@store');
    Route::put('/pages/update/{id}', 'Cms\PageController@update');
    Route::get('/pages/{id}', 'Cms\PageController@show');
    Route::get('/pages/', 'Cms\PageController@index');
    Route::delete('/pages/{id}', 'Cms\PageController@delete');

    Route::get('user/profile', function () {
        // Uses first & second Middleware
    });
});
