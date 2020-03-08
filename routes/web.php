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

/*
 *Home page
 */
Route::get('/', 'Frontend\PageController@render');
/*
 *Other pages
 */
Route::get('/{slug}', 'Frontend\PageController@render')->where('slug', '([A-Za-z0-9\-\/]+)');;
