<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * UsersController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show employer profile.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function employer_profile()
    {
        return view('employer-profile');
    }

    /**
     * Show employer jobs.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function employer_jobs()
    {
        return view('employer-jobs');
    }

    /**
     * Edit profile form.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function employer_edit_profile()
    {
        return view('employer-edit-profile');
    }

    /**
     * Actual process of updating.
     *
     * @param UpdateProfileRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function employer_update_profile(UpdateProfileRequest $request)
    {
        $request->persist();

        return redirect()->route(
            'employer-edit-profile',
            request()->user()->id
        );
    }
}
