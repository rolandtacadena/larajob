@extends('layouts.main')

@section('content')

    <div class="page-content">

        <div class="large-8 columns">

            <h4>Create Job</h4>

            <p>You'll be able to edit your job at any time after you post. Questions? Contact us.</p>

            @include('partials.forms.create-job-form')

        </div>

        <div class="large-4 columns">

            @include('partials.sidebar2')

        </div>

    </div>

@endsection