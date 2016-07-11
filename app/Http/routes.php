<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a given Closure or controller and enjoy the fresh air.
|
*/

Route::get('/', 'HomeController@index');

Route::get('/facebook/callback', 'Auth\RegisterController@fbcallback');

Route::auth();

