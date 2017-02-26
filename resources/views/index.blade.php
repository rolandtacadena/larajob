@extends('layouts.main')

@section('content')
	
	<div class="page-content">

		<div class="large-8 columns">

			@include('partials.jobs-filter')

			<div class="jobs-list">

				@each('partials.job-item', $jobs, 'job')

			</div>

		</div>

		<div class="large-4 columns">

			<a class="button expanded" href="#">So Basic</a>

		</div>

	</div>

@endsection