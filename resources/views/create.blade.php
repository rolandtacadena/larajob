@extends('layouts.main')

@section('content')

    <div class="page-content">

        <div class="large-8 columns">

            <h1>Create Job</h1>

            <p>You'll be able to edit your job at any time after you post. Questions? Contact us.</p>

            <form method="POST" action="{{ route('store-job') }}">

                {{ csrf_field() }}

                <fieldset class="fieldset">
                    <legend>Job Description</legend>
                    <div class="row">
                        <div class="small-12 columns">
                            <label>* Title
                                <input type="text" name="title" value="" placeholder="Title" required>
                            </label>
                        </div>
                        <div class="small-12 columns">
                            <label>* Description
                                <textarea name="description" placeholder="Description" cols="30" rows="10" required></textarea>
                            </label>
                        </div>
                        <div class="small-12 columns">
                            <label>* How to apply
                                <textarea name="how_to_apply" placeholder="How to apply" cols="30" rows="10" required></textarea>
                            </label>
                        </div>
                        <div class="small-12 columns">
                            <fieldset class="large-6 columns">
                                <legend>Categories</legend>

                                <!-- Listing all categories -->
                                @foreach( $categories as $category_id => $category_name )
                                    <input id="cat{{ $category_id }}" type="checkbox" name="categories[]" value="{{ $category_id }}">
                                    <label for="cat{{ $category_id }}">{{ $category_name }}</label>
                                @endforeach

                            </fieldset>
                        </div>
                    </div>
                </fieldset>

                <fieldset class="fieldset">
                    <legend>Job Type</legend>
                    <div class="row">
                        <!-- Listing all job types -->
                        @foreach( $types as $type_id => $type_name )
                            <div class="small-12 columns">
                                <input id="type{{ $type_id }}" type="radio" name="type" value="{{ $type_id }}">
                                <label for="type{{ $type_id }}">{{ ucwords($type_name) }}</label>
                            </div>
                        @endforeach
                    </div>
                </fieldset>
                <fieldset class="fieldset">
                    <legend>Job Location</legend>
                    <div class="row">
                        <input type="text" name="location" value="" placeholder="location" required>
                    </div>
                </fieldset>
                <div class="row">
                    <div class="small-12 columns">
                        <button type="submit" class="button">Post Job</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="large-4 columns">

            {{--@include('sidebar')--}}

        </div>

    </div>

@endsection