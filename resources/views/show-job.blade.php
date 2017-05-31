@extends('layouts.main')

@section('content')

    <div id="show-job" class="page-content">

        <div class="large-4 columns job-sidebar">
            <div class="row">

                <div class="large-4 columns">
                    <img src="https://larajobs.com/logos/d552d6ecf816767a1c1961fb2ad99e6d.jpg" alt="">
                </div>

                <div class="large-8 columns">
                    <div class="small-12">
                        <span class="company_name">{{ $job->user->company_name }}</span>
                    </div>
                    <div class="small-12">
                        <span class="company_tagline">
                            {{ $job->user->company_tagline }}
                        </span>
                    </div>
                </div>

            </div>
            <hr>
            <div class="row">
                <h5>Job Details</h5>
                <p class="location">{{ $job->location    }}</p>
                <p class="date_posted">{{ $job->created_at->format('F d, Y') }}</p>
            </div>
        </div>

        <div class="large-8 columns show-job-details">
            <h3>{{ $job->title }}</h3>

            <div class="job_description">
                <h4>Job Description</h4>
                <p>{{ $job->description }}</p>
            </div>

            <div class="how_to_apply">
                <h4>How to apply</h4>
                <p>{{ $job->how_to_apply }}</p>
            </div>

            <!-- show update job button if the user owns the job -->
            @can('update-job', $job)
                <a class="button dark" href="{{ route('edit-job', $job) }}">Edit Job</a>
            @endcan

        </div>
    </div>

@endsection