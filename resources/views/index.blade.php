@extends('layouts.main')

@section('content')
	
	<div id="index" class="page-content">

		<div class="large-8 columns">

			@include('partials.jobs-filter')

			<div class="jobs-list">

				<div v-cloak v-if="searching == true" class="loader">Loading...</div>

				<template v-if="searching == false">
					<div v-if="hasResults == false && searchHasError == false">
						<!-- display the jobs-list component with the initial jobs -->
						<jobs-list :jobs="jobs"></jobs-list>
					</div>

					<div v-if="hasResults == true && searchHasError == false">
						<a v-cloak class="clear-results" @click="clearResults">
							<span class="label info"><i class="fi-x"></i>clear results</span>
						</a>
						<!-- display the jobs-list component with the search results -->
						<jobs-list :jobs="searchResults"></jobs-list>
					</div>

					<div v-if="searchHasError == true">
						<p v-cloak>@{{ searchError }} or
							<a class="clear-results" @click="clearResults">
							<span class="label info">
								<i class="fi-x"></i>clear results
							</span>
							</a>
						</p>
					</div>
				</template>

			</div>
		</div>

		<div class="large-4 columns">
			@include('partials.sidebar')
		</div>
		
	</div>

@endsection

@section('additional-scripts')
	<script>

		Vue.component('jobs-list', {

		    /**
             * <job-list> component props
             */
			props: ['jobs', 'authUser', 'isLoggedIn'],

			/**
             * Templete for <job-list>
             */
            template: `
            	<div>
            		<job
            			v-for="job in jobs"
            			:job="job"
            			:isLoggedIn="isLoggedIn"
            			:key="job.id"
					>
					</job>
				</div>
			`
		});

		Vue.component('job', {

		    /**
			 * <job> component props
			 */
		    props: ['job', 'isLoggedIn'],

			/**
			 * Templete for <job>
			 */
		    template: `<div class="job-item">
							<a :href="'jobs/' + job.id">
								<div class="row columns">
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
														<span
															v-if="authUser.id == job.user.id"
															class="label owned"
														>
															you owned this job
														</span>
													</div>
													<div class="small-12 columns">
														<span class="company_web_url">
															@{{ job.user.company_web_url }}
														</span>
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
					`,
        });

		var jobs = new Vue({

			el: '#index',

			data: {
                jobs: [],
                searchResults: [],
                isLoggedIn: false,
                hasResults: false,
                searchHasError: false,
                authUser: {},
                searchError: '',
                searchQuery: '',
                searching: false
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
                        .then((response) => this.jobs = response.data)
                        .catch((error) => console.log(error));
                },

                /**
                 * Get the authenticated user.
                 */
                getAuthUser() {
                    axios.get('/ajax/get-auth-user')
                        .then((response) => {
                            if( ! response.data.hasOwnProperty('error')) {
                                this.authUser = response.data.authUser;
                                this.isLoggedIn = true;
                            }
						})
                        .catch((error) => console.log(error))
                },

                /**
				 * Get the matching jobs via ajax through the entered query.
                 */
                searchJob()
				{
                    this.searching = true;
                    axios.get('/ajax/search?q=' + this.searchQuery)
					.then((response) => {
                        this.searching = false;
                        if(response.data.hasOwnProperty('error')) {
                            this.searchError = response.data.error;
                            this.searchHasError = true;
                            this.hasResults = false;
                        } else {
                            this.searchResults = response.data
                            this.hasResults = true;
                            this.searchHasError = false;
                        }
					})
					.catch((error) => console.log(error));
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