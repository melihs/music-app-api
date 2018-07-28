<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends BaseController
{
    public function index()
    {
        try {
            $category = Category::all();
            $this->sendResponse($category, 200, null);
        } catch (\Exception $e) {
            $this->sendResponse(null, 500, $e->getMessage());
        }
    }
}
