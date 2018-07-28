<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends BaseController
{
    public function index()
    {
        try {
            $user = User::with('favorites')->get();
            $this->sendResponse($user, 200, null);
        } catch (\Exception $e) {
            $this->sendResponse(null, 500, $e->getMessage());
        }
    }

    public function addFavorite($id)
    {
        $user = User::find($id)->favorite()->first();

        $user_id = request()->get('user_id');

        if (empty($user) || (!isset($user_id) or empty($user_id))) {
            return $this->sendResponse(null, 400, 'Empty query !');
        }

        $user->addFavorite($user_id);

        return $this->sendResponse($user->load('favorites'), 200, null);
    }

   
    public function removeFavorite($id)
    {
        $user = User::find($id)->favorite()->first();
        
        $user_id = request()->get('user_id');

        if (empty($user) || (isset($user_id) or empty($user_id))) {
            return $this->sendResponse(null, 400, 'Empty query !');
        }

        $user->removeDirectory($user_id);
        
        return $this->sendResponse($user->load('favorites'), 200, null);
    }
}
