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
                        <h5>My Jobs</h5>
                        <ol>
                            @foreach($employer_jobs as $job)
                                <li><a href="{{ route('edit-job', $job) }}">{{ $job->title }}</a></li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection