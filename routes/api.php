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
    Route::get('/pages/create', 'Cms\PageController@store');

    Route::get('user/profile', function () {
        // Uses first & second Middleware
    });
});
