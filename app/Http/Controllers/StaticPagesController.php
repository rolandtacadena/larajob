<?php

namespace App\Http\Controllers;

class StaticPagesController extends Controller
{
    /**
     * About us page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function about()
    {
        return view('static.about');
    }
}
