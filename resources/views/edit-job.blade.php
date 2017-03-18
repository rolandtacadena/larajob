@extends('layouts.main')

@section('content')
    <div id="edit-job" class="page-content profile">
        <div class="row collapse">
            <div class="medium-2 columns">
                @include('partials.employer-tabs')
            </div>
            <div class="medium-10 columns">
                <div class="tabs-content vertical">
                    <div class="tabs-panel">
                        @include('partials.forms.edit-job-form')
                        @include('partials.forms.delete-job-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('additional-scripts')
    <script>
        $('#delete-job-btn').click(function (e) {
            e.preventDefault();
            swal({
                title: "Are you sure?",
                text: "You will not be able to revoke this action!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Delete",
                closeOnConfirm: false,
            }, function(){
                $('#delete-job-form').submit();
            });
        });
    </script>
@endsection