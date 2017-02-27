@extends('layouts.main')

@section('content')

    <div class="page-content">

        <div class="large-8 columns">

            <h3>Create Job</h3>

            <p>You'll be able to edit your job at any time after you post. Questions? Contact us.</p>

            <form method="POST" action="{{ route('store-job') }}">

                {{ csrf_field() }}

                <fieldset class="fieldset">
                    <legend>Job Description</legend>
                    <div class="row">
                        <div class="small-12 columns">
                            <label>* Title
                                <input
                                    type="text"
                                    name="title"
                                    value="{{ old('title') }}"
                                    placeholder="Title"
                                    required
                                >
                            </label>
                        </div>
                        <div class="small-12 columns">
                            <label>* Description
                                <textarea
                                    name="description"
                                    placeholder="Description"
                                    cols="30"
                                    rows="10"
                                    required>{{ old('description') }}</textarea>
                            </label>
                        </div>
                        <div class="small-12 columns">
                            <label>* How to apply
                                <textarea
                                    name="how_to_apply"
                                    placeholder="How to apply"
                                    cols="30"
                                    rows="10"
                                    required>{{ old('how_to_apply') }}</textarea>
                            </label>
                        </div>
                        <div class="small-12 columns">
                            <fieldset>
                                <legend>Categories</legend>

                                <!-- Listing all categories -->
                                @foreach( $categories as $category_id => $category_name )
                                    <input
                                        id="cat{{ $category_id }}"
                                        type="checkbox"
                                        name="categories[]"
                                        value="{{ $category_id }}"
                                        @if(!empty(old('categories')))
                                            {{ in_array($category_id, old('categories')) ? ' checked' : '' }}
                                        @endif
                                    >
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
                                <input
                                    id="type{{ $type_id }}"
                                    type="radio" name="type"
                                    value="{{ $type_id }}"
                                    {{ old('type') == $type_id ? ' checked' : '' }}
                                >
                                <label for="type{{ $type_id }}">{{ ucwords($type_name) }}</label>
                            </div>
                        @endforeach
                    </div>
                </fieldset>
                <div class="row">
                    <div class="small-12 columns">
                        <label>* Location
                            <input
                                type="text"
                                name="location"
                                value="{{ old('location') }}"
                                placeholder="location"
                                required
                            >
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="small-12 columns">
                        <button type="submit" class="button large">Post Job</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="large-4 columns">

            @include('partials.sidebar2')

        </div>

    </div>

    @foreach($errors->all() as $error)
        {{ $error }}
    @endforeach
@endsection