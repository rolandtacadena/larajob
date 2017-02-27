@extends('layouts.main')

@section('content')
	
	<div class="page-content index">

		<div class="large-8 columns">

			@include('partials.jobs-filter')

			<div class="jobs-list">

				@each('partials.job-item', $jobs, 'job')

			</div>

		</div>

		<div class="large-4 columns">

			@include('partials.sidebar')

		</div>

	</div>

@endsection