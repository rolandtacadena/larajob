<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Authenticated user inctance.
     *
     * @var \Illuminate\Contracts\Auth\Authenticatable|null
     */
    protected $user;

    /**
     * UsersController constructor.
     */
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });

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
        $employer_jobs = $this->user->jobs;

        return view('employer-jobs', compact('employer_jobs'));
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
