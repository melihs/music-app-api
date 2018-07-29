<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends BaseController
{
    /**
     * Add song to user's favorite
     * @param  [integer] song_id
     * @return [array]
     */
    public function addFavorite($song_id)
    {
        try {
            $user = Auth::user()->addFavorite($song_id);
            return $this->sendResponse(null, 201, null);
        } catch (\Exception $e) {
            return $this->sendResponse(null, 500, $e->getMessage());
        }
    }


    /**
     * remove song from user's favorite
     * @param  [integer] song_id
     * @return [array]
     */
    public function removeFavorite($song_id)
    {
        try {
            $user = Auth::user()->removeFavorite($song_id);
            return $this->sendResponse(null, 201, null);
        } catch (\Exception $e) {
            return $this->sendResponse(null, 500, null);
        }
    }

    /**
     * Get user's favorite songs
     * @return [array]
     */
    public function getFavorites()
    {
        try {
            $favorites = Auth::user()->with('favorites')->get();
            return $this->sendResponse($favorites, 200, null);
        } catch (\Exception $e) {
            return $this->sendResponse(null, 500, $e->getMessage());
        }
    }

    /**
     * Play song
     * @param  [integer] song_id
     * @return [array]
     */
    public function playSong($song_id)
    {
        try {
            Auth::user()->favorites()->update(['is_playing' => false]);
            $favorites = Auth::user()->favorites()
            ->where('song_id', $song_id)
            ->first()
            ->pivot
            ->update(['is_playing' => true]);

            return $this->sendResponse($favorites, 201, null);
        } catch (\Exception $e) {
            return $this->sendResponse(null, 500, $e->getMessage());
        }
    }

    /**
     * Pause song
     * @param  [integer] song_id
     * @return [array]
     */
    public function pauseSong($song_id)
    {
        try {
            $favorites = Auth::user()->favorites()
            ->where('song_id', $song_id)
            ->first()
            ->pivot
            ->update(['is_playing' => false]);

            return $this->sendResponse($favorites, 200, null);
        } catch (\Exception $e) {
            return $this->sendResponse(null, 500, $e->getMessage());
        }
    }

    /**
     * Send volume for song
     * @param  [integer] song_id
     * @param  [integer] volume
     * @return [array]
     */
    public function sendVolume($song_id)
    {
        try {
            $volume = request()->has('volume') ? request()->get('volume') : 0;
            $favorites = Auth::user()->favorites()
            ->where('song_id', $song_id)
            ->first()
            ->pivot
            ->update(['volume' => $volume]);
            return $this->sendResponse(null, 201, null);
        } catch (\Exception $e) {
            return $this->sendResponse(null, 500, $e->getMessage());
        }
    }
}
