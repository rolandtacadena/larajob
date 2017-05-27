@extends('layouts.main')

@section('content')
	
	<div id="index" class="page-content">

		<div class="large-8 columns">

			@include('partials.jobs-filter')

			<div class="jobs-list">

				<div v-show="hasResults == false && searchHasError == false">

					<a v-for="job in jobs" :href="'jobs/' + job.id">
						<div class="row job">

							<div class="company-logo-container float-left">
								<div class="company-logo">
									<img src="https://larajobs.com/logos/d552d6ecf816767a1c1961fb2ad99e6d.jpg" alt="">
								</div>
							</div>

							<div class="job-details small-12 columns">
								<div class="row">

									<div class="small-3 columns">
										<div class="row">

											<div class="small-12 columns">
												<!-- display this badge if the user created the job -->
												<span v-if="authUser.id == job.user.id" class="label owned">you owned this job</span>
											</div>

											<div class="small-12 columns">
												<span class="company_web_url">@{{ job.user.company_web_url }}</span>
											</div>

										</div>
									</div>

									<div class="small-9 columns">
										<div class="row">

											<div class="small-7 columns">
												<p><span class="job-title">@{{ job.title }}</span></p>
												<p>
													<b><span class="company_name">@{{ job.user.company_name }}</span></b> -
													<span class="company_tagline">@{{ job.user.company_tagline }}</span>
												</p>
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

				<div v-show="hasResults == true && searchHasError == false">
					<a @click="clearResults">Clear results</a>
					<a v-for="result in searchResults" :href="'jobs/' + result.id">
						<div class="row job">

							<div class="company-logo-container float-left">
								<div class="company-logo">
									<img src="https://larajobs.com/logos/d552d6ecf816767a1c1961fb2ad99e6d.jpg" alt="">
								</div>
							</div>

							<div class="job-details small-12 columns">
								<div class="row">
									<div class="small-3 columns">
										<div class="row">

											<div class="small-12 columns" v-if="isLoggedIn == true">
												<span v-if="authUser.id == result.user.id" class="label owned">you owned this job</span>
											</div>

											<div class="small-12 columns">
												<span class="company_web_url">@{{ result.user.company_web_url }}</span>
											</div>

										</div>
									</div>
									<div class="small-9 columns">
										<div class="row">

											<div class="small-7 columns">
												<p><span class="job-title">@{{ result.title }}</span></p>
												<p>
													<b><span class="company_name">@{{ result.user.company_name }}</span></b> -
													<span class="company_tagline">@{{ result.user.company_tagline }}</span>
												</p>
											</div>

											<div class="small-5 columns text-right">
												<div class="row">
													<div class="small-12">
														<span class="job-type">@{{ result.type.name }}</span>
													</div>
													<div class="small-12">
														<span class="location">@{{ result.location }}</span>
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

				<div v-show="searchHasError == true">
					<p>@{{ searchError }} or <a @click="clearResults">Clear results</a></p>
				</div>

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
                authUser: {},
                isLoggedIn: false,
				searchHasError: false,
                searchError: '',
                searchQuery: '',
				hasResults: false,
				searchResults: []
            },

			/**
			 * Once the vue instance is created.
			 */
			created(){
                this.getAllJobs();
                this.getAuthUser();
			},

			methods: {

			    /**
				 * Get all jobs via ajax.
				 */
				getAllJobs() {
                    axios.get('/ajax/jobs')
					.then(response => this.jobs = response.data)
					.catch(error => console.log(error));
				},

				/**
				 * Get the authenticated user.
				 */
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
			    },

                /**
				 * Get the matching jobs via ajax through the entered query.
                 */
                searchJob()
				{
                    var _self = this;
                    axios.get('/ajax/search?q=' + this.searchQuery)
					.then(function (response) {
						if(response.data.hasOwnProperty('error')) {
							_self.searchError = response.data.error;
							_self.searchHasError = true;
                            _self.hasResults = false;
                        } else {
							_self.searchResults = response.data;
							_self.hasResults = true;
                            _self.searchHasError = false;
                        }
					})
					.catch(function (error) {
						console.log(error);
					});
				},

                /**
				 * Reset search
                 */
                clearResults()
				{
                    this.searchHasError = false,
                    this.searchError = '',
                    this.searchQuery = '',
                    this.hasResults = false,
                    this.searchResults = []
				}
			}
		});

	</script>
@endsection