@extends('layouts.main')

@section('content')

    <div class="page-content show-job">

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
        </div>

    </div>

@endsection