@extends('layouts.main')

@section('content')
	
	<div id="index" class="page-content">

		<div class="large-8 columns">

			@include('partials.jobs-filter')

			<div class="jobs-list">

				@each('partials.job-item', $jobs, 'job')

				{{ $jobs->links() }}

			</div>

		</div>

		<div class="large-4 columns">

			@include('partials.sidebar')

		</div>

	</div>

@endsection