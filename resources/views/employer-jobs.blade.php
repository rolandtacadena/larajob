@extends('layouts.main')

@section('content')

    <div id="profile" class="page-content">
        <div class="row">
            <div class="medium-2 columns">
                @include('partials.employer-tabs')

                <div class="row columns side-actions">
                    <a class="button expanded add-job dark" href="{{ route('create-job') }}">+ Add New</a>
                </div>
            </div>
            <div class="medium-10 columns">
                @if(count($employer_jobs))
                    <div class="table-scroll">
                        <table id="user-jobs-list" class="unstriped hover">
                            <thead>
                            <tr>
                                <th width="200">Title</th>
                                <th width="250">Description</th>
                                <th width="100">Location</th>
                                <th width="100">Date Created</th>
                            </tr>
                            </thead>
                            <tbody>

                                @foreach($employer_jobs as $job)
                                    <tr>
                                        <td>
                                            {{ $job->title }} -
                                            <a href="{{ route('edit-job', $job) }}">
                                                <span
                                                    data-tooltip aria-haspopup="true"
                                                    class="edit-job-tip has-tip"
                                                    data-disable-hover="false"
                                                    tabindex="1"
                                                    title="Click to edit/delete this job"
                                                >
                                                    Edit job
                                                </span>
                                            </a>
                                        </td>
                                        <td>{{ str_limit($job->description) }}</td>
                                        <td>{{ $job->location }}</td>
                                        <td>{{ $job->created_at->toDayDateTimeString() }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="row columns">
                        {{ $employer_jobs->links() }}
                    </div>
                @else
                    <p>No jobs found. <a href="{{ route('create-job') }}">Create one.</a></p>
                @endif
            </div>
        </div>
    </div>

@endsection