<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;

class UsersController extends Controller
{
    /**
     * UsersController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth')->except('get_auth_user');
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
     * Edit profile form.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function employer_edit_profile()
    {
        return view('employer-edit-profile');
    }

    /**
     * Show employer jobs.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function employer_jobs()
    {
        $employer_jobs = request()->user()->jobs()->latest()->paginate(50);

        return view('employer-jobs', compact('employer_jobs'));
    }

    /**
     * Actual process of updating.
     *
     * @param ProfileRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function employer_update_profile(ProfileRequest $request)
    {
        $request->update();

        flash()->success(
            'Profile Updated', 'You have successfully updated your profile!'
        );

        return redirect()->route(
            'employer-edit-profile',
            request()->user()->id
        );
    }

    /**
     * Get the authenticated user.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function get_auth_user()
    {
        if( ! auth()->check()) {
            return response()->json([
                'error' => 'No authenticated user found'
            ]);
        }

        return response()->json([
            'authUser' => [
                'id' => auth()->id(),
                'name' => auth()->user()->name,
                'email' => auth()->user()->email
            ]
        ]);
    }
}
