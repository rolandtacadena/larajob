<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateJobsFormRequest;
use App\Http\Requests\UpdateJobsFormRequest;
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
        $this->middleware('auth')->except(['index', 'show', 'all']);

        $this->jobs = $jobs;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Get all jobs.
     *
     * @return mixed
     */
    public function all()
    {
        return $this->jobs->all()
            ->with('user', 'type')
            ->take(15)
            ->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create-job');
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

        flash()->success(
            'Job Created',
            'You have successfully created a new job!'
        );

        return redirect()->route('create-job');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        if(auth()->check() && auth()->user()->can('update-job', $job)){
            flash()->info(
                'You created this job',
                'You have the option to update the job.'
            );
        }

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
        return view('edit-job', compact('job'));
    }

    /**
     *  Update the specified resource in storage.
     *
     * @param UpdateJobsFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateJobsFormRequest $request)
    {
        $request->update();

        flash()->success(
            'Job Updated',
            'You have successfully updated the job!'
        );

        return redirect()->route(
            'employer_jobs',
            $request->user()->id
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        $job->delete();

        flash()->success(
            'Job Deleted',
            'Job successfully deleted!'
        );

        return redirect()->route(
            'employer_jobs',
            request()->user()->id
        );
    }
}
