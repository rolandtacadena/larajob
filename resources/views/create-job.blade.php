@extends('layouts.main')

@section('content')

    <div id="create-job" class="page-content">

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

@section('additional-scripts')
    <script src="{{ asset('js/vendor/vue.js')  }}"></script>
    <script>
        var createJob = new Vue({
           el: '#create-job',
            data: {
                title: '',
                description: '',
                how_to_apply: '',
                location: ''
            }
        });
    </script>
@endsection