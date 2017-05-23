@extends('layouts.main')

@section('content')
	
	<div id="index" class="page-content">

		<div class="large-8 columns">

			@include('partials.jobs-filter')

			<div class="jobs-list">

				<!-- displaying each jobs through vue -->
				<a v-for="job in jobs" :href="'jobs/' + job.id">
					<div class="row job">

						<div class="company-logo-container float-left">
							<div class="company-logo">
								<img src="https://larajobs.com/logos/d552d6ecf816767a1c1961fb2ad99e6d.jpg" alt="">
							</div>
						</div>

						<div class="job-details small-12 columns">
							<div class="row">
								<div class="small-4 columns">
									<div class="row">
										<div class="small-12 columns">
											<!-- display this badge if the user created the job -->
											<span v-if="authUser.id == job.user.id" class="label owned">you owned this job</span>
										</div>
										<div class="small-12 columns">
											<span class="company_name">@{{ job.user.company_web_url }}</span>
										</div>
									</div>
								</div>
								<div class="small-8 columns">
									<div class="row">
										<div class="small-7 columns">
											<span class="job-title">@{{ job.title }}</span>
										</div>
										<div class="small-5 columns text-right">
											<div class="row">
												<div class="small-12">
													<span class="job-type">@{{ job.type.name }}</span>
												</div>
												<div class="small-12">
													<span class="location">@{{ job.location }}</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
		</div>

		<div class="large-4 columns">
			@include('partials.sidebar')
		</div>

	</div>

@endsection

@section('additional-scripts')
	<script>
		var jobs = new Vue({
			el: '#index',
            data: {
                jobs: [],
				isLoggedIn: false,
				authUser: {}
            },
			created(){
                this.getAllJobs();
                this.getAuthUser();
			},
			methods: {
			    getAllJobs() {
                    axios.get('/ajax/jobs')
					.then(response => this.jobs = response.data)
					.catch(error => console.log(error));
				},

                getAuthUser() {
			        var _self = this;
					axios.get('/ajax/get-auth-user')
					.then(function (response) {
                        if( ! response.data.hasOwnProperty('error')) {
                            _self.authUser = response.data.authUser;
							_self.isLoggedIn = true;
                        }
                    })
					.catch(function (error) {
						console.log('error');
                    })
			    }
			}
		})
	</script>
@endsection