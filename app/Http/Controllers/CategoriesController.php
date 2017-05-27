<?php

namespace App\Http\Controllers;

use App\Category;

class CategoriesController extends Controller
{
    /**
     * CategoriesController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get all categories.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all() {
        return Category::all();
    }
}
