<a href="{{ route('show-job', $job) }}">
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
                            @can('update-job', $job)
                                <span class="label owned">you owned this job</span>
                            @endcan
                        </div>
                        <div class="small-12 columns">
                            <span class="company_name">{{ $job->user->company_web_url }}</span>
                        </div>
                    </div>
                </div>

                <div class="small-8 columns">
                    <div class="row">
                        <div class="small-7 columns">
                            <span class="job-title">{{ str_limit($job->title, 30) }}</span>
                        </div>
                        <div class="small-5 columns text-right">
                            <div class="row">
                                <div class="small-12">
                                    <span class="job-type">{{ $job->type->name }}</span>
                                </div>
                                <div class="small-12">
                                    <span class="location">{{ $job->location }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</a>