@extends('layouts.main')

@section('content')

    <div class="page-content profile">
        <div class="row collapse">

            <div class="medium-2 columns">
                @include('partials.employer-tabs')
            </div>

            <div class="medium-10 columns">
                <div class="tabs-content vertical">
                    <div class="tabs-panel">

                        @if(count($employer_jobs))
                            <h5>My Jobs</h5>
                            <ol>
                                @foreach($employer_jobs as $job)
                                    <li><a href="{{ route('edit-job', $job) }}">{{ $job->title }}</a></li>
                                @endforeach
                            </ol>
                        @else
                            <p>No jobs found. <a href="{{ route('create-job') }}">Create one.</a></p>
                        @endif

                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>

@endsection