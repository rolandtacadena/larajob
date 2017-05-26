<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Scout search on jobs.
     *
     * @param Request $request
     * @return array|\Illuminate\Database\Eloquent\Collection
     */
    public function search(Request $request)
    {
        $error = ['error' => 'No results found, please try with different keywords.'];

        if($request->has('q'))
        {
            $jobs = Job::search($request->get('q'))->get()->load('user', 'type');
            return $jobs->count() ? $jobs : $error;
        }

        return $error;
    }
}
