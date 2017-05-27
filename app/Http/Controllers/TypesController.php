<?php

namespace App\Http\Controllers;

use App\Type;

class TypesController extends Controller
{
    /**
     * TypesController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get all job types.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all() {
        return Type::all();
    }
}
