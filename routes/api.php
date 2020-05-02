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
    Route::post('/auth/signup', 'Cms\Authentication\Authentication@signup');
    Route::post('/auth/login', 'Cms\Authentication\Authentication@login');

    Route::group(['middleware' => ['validate.token']], function () {
        Route::get('/settings', 'Cms\Settings\SettingsController@all');
        Route::get('/token/validate', 'Cms\Authentication\Authentication@ping');
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
        Route::get('/layouts', 'Cms\PageController@getLayouts');



        Route::get('user/profile', function () {

        });
        /*
         * Images
         */
        Route::post('/images/upload', 'Cms\Image\ImageController@upload');
        Route::get('/images/album/{id}', 'Cms\Image\ImageController@getImagesByAlbumID');
        Route::put('/images/update/{id}', 'Cms\Image\ImageController@update');
        /*
         * Albums
         */
        Route::post('/albums/create', 'Cms\Image\AlbumController@store');
        Route::post('/albums/createAndReturn', 'Cms\Image\AlbumController@storeAndReturnId');
        Route::put('/albums/update/{id}', 'Cms\Image\AlbumController@update');
        Route::get('/albums/{id}', 'Cms\Image\AlbumController@show');
        Route::get('/albums/', 'Cms\Image\AlbumController@index');
        Route::delete('/albums/{id}', 'Cms\Image\AlbumController@delete');
        /*
         * Menus
         */
        Route::post('/menus/create', 'Cms\Menu\MenuController@store');
        Route::put('/menus/update/{id}', 'Cms\Menu\MenuController@update');
        Route::get('/menus/{id}', 'Cms\Menu\MenuController@show');
        Route::get('/menus/', 'Cms\Menu\MenuController@index');
        Route::delete('/menus/{id}', 'Cms\Menu\MenuController@delete');

        Route::post('/menus/{id}/routes', 'Cms\Menu\RouteController@store');
    });

});
