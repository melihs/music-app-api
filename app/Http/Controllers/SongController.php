<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Song;

class SongController extends BaseController
{
    public function index()
    {
        try {
            $song = Song::with('category')->get();
            return $this->sendResponse($song, 200, null);
        } catch (\Exception $e) {
            return $this->sendResponse(null, 500, $e->getMessage());
        }
    }
}
