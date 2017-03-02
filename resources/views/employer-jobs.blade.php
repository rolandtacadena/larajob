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
                        <ul>
                            @foreach($authUser->jobs as $job)
                                <li><a href="">{{ $job->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection