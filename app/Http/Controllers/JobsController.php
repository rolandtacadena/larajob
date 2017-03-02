<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateJobsFormRequest;
use App\Job;
use App\Repositories\JobRepository;

class JobsController extends Controller
{
    /**
     * @var JobRepository
     */
    protected $jobs;

    /**
     * Setting up repository vars and middlewares.
     *
     * JobsController constructor.
     * @param JobRepository $jobs
     */
    public function __construct(JobRepository $jobs)
    {
        $this->middleware('auth')->except(['index', 'show']);

        $this->jobs = $jobs;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = $this->jobs->allPaginated();

        return view('index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateJobsFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateJobsFormRequest $request)
    {
        $request->persist();

        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        return view('show-job', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Job $job
     */
    public function update(Request $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        //
    }
}
