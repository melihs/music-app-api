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

Route::group(['middleware' => ['auth:api']], function () {
    
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
    | User Favorites routes and songs processes
    |--------------------------------------------------------------------------
    | Endpoint: /api/favorites
    | Endpoint: /api/favorite/{song_id}/add
    | Endpoint: /api/favorite/{song_id}/remove
    | Endpoint: /api/songs/{song_id}/play
    | Endpoint: /api/songs/{song_id}/pause
    | Endpoint: /api/songs/{song_id}/volume
    */
    Route::get('favorites', 'UserController@getFavorites');
    Route::post('favorite/{song_id}/add', 'UserController@addFavorite');
    Route::post('favorite/{song_id}/remove', 'UserController@removeFavorite');
    Route::post('songs/{song_id}/play', 'UserController@playSong');
    Route::post('songs/{song_id}/pause', 'UserController@pauseSong');
    Route::post('songs/{song_id}/volume', 'UserController@sendVolume');
    

    /*
    |--------------------------------------------------------------------------
    | Category Controller Routes
    |--------------------------------------------------------------------------
    | Endpoint: /api/categories
    */
    Route::resource('categories', 'CategoryController');

    /*
    |--------------------------------------------------------------------------
    | Song Controller Routes
    |--------------------------------------------------------------------------
    | Endpoint: /api/songs
    */
    Route::resource('songs', 'SongController');
});
