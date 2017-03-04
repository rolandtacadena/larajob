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
                        <h4>User Profile</h4>
                        @include('partials.forms.edit-profile-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection