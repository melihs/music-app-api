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
    | Favorite Controller
    |--------------------------------------------------------------------------
    | Endpoint: /api/favorites
    | Endpoint: /api/favorite/{song_id}/add
    | Endpoint: /api/favorite/{song_id}/remove
    | Endpoint: /api/favorite/{song_id}/play
    | Endpoint: /api/favorite/{song_id}/pause
    | Endpoint: /api/favorite/{song_id}/volume
    */
    Route::get('favorites', 'FavoriteController@getFavorites');
    Route::post('favorite/{song_id}/add', 'FavoriteController@addFavorite');
    Route::post('favorite/{song_id}/remove', 'FavoriteController@removeFavorite');
    Route::post('favorite/{song_id}/play', 'FavoriteController@playSong');
    Route::post('favorite/{song_id}/pause', 'FavoriteController@pauseSong');
    Route::post('favorite/{song_id}/volume', 'FavoriteController@sendVolume');


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
