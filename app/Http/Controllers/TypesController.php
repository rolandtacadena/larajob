<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;

class TypesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function all() {
        return Type::all();
    }
}
