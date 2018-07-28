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
            return $this->sendResponse($category, 200, null);
        } catch (\Exception $e) {
            return $this->sendResponse(null, 500, $e->getMessage());
        }
    }
}
