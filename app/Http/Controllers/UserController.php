<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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
}
