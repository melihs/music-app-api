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

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {

    /*
    |--------------------------------------------------------------------------
    | Authenticate User Route
    |--------------------------------------------------------------------------
    | Endpoint: /api/user
    */
    Route::get('user', 'AuthController@user');

    /*
    |--------------------------------------------------------------------------
    | User Controller Routes
    |--------------------------------------------------------------------------
    | Endpoint: /api/users
    */
    Route::resource('users', 'UserController');


    /*
    |--------------------------------------------------------------------------
    | User Favorites routes
    |--------------------------------------------------------------------------
    | Endpoint: favorite/{song_id}/add
    | Endpoint: favorite/{song_id}/remove
    */
    Route::post('favorite/{song_id}/add', 'UserController@addFavorite');
    Route::post('favorite/{song_id}/remove', 'UserController@removeFavorite');

    /*
    |--------------------------------------------------------------------------
    | Category Controller Routes
    |--------------------------------------------------------------------------
    | Endpoint: /api/categories
    */
    Route::resource('categories', 'Categoriescontroller');

    /*
    |--------------------------------------------------------------------------
    | Song Controller Routes
    |--------------------------------------------------------------------------
    | Endpoint: /api/songs
    */
    Route::resource('songs', 'SongsController');
});
