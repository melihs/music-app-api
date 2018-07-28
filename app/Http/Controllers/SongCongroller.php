<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Song;

class SongCongroller extends BaseController
{
    public function index()
    {
        try {
            $song = Song::all();
            $this->sendResponse($song, 200, null);
        } catch (\Exception $e) {
            $this->sendResponse(null, 500, $e->getMessage());
        }
    }
}
