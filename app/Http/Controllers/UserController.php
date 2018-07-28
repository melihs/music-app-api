<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends BaseController
{
    public function index()
    {
        try {
            $user = User::all();
            return $this->sendResponse($user, 201, null);
        } catch (\Exception $e) {
            return $this->sendResponse(null, 500, $e->getMessage());
        }
    }

    public function addFavorite($song_id)
    {
        try {
            $user = Auth::user()->addFavorite($song_id);
            return $this->sendResponse(null, 201, null);
        } catch (\Exception $e) {
            return $this->sendResponse(null, 500, $e->getMessage());
        }
    }


    public function removeFavorite($id)
    {
        try {
            $user = Auth::user()->removeDirectory($song_id);
            return $this->sendResponse(null, 200, null);
        } catch (\Exception $e) {
            return $this->sendResponse(null, 200, null);
        }
    }

    public function getFavorites()
    {
        try {
            $favorites = Auth::user()->with('favorites')->get();
            return $this->sendResponse($favorites, 200, null);
        } catch (\Exception $e) {
            return $this->sendResponse(null, 500, $e->getMessage());
        }
    }

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
