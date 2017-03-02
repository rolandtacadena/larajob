<ul class="tabs vertical">
    <li class="tabs-title {{ request()->route()->getName() == 'employer_jobs' ? 'is-active' : '' }}">
        <a href="{{ route('employer_jobs', $authUser) }}">My Jobs</a>
    </li>
    <li class="tabs-title {{ request()->route()->getName() == 'employer-edit-profile' ? 'is-active' : '' }}">
        <a href="{{ route('employer-edit-profile', $authUser) }}">Profile</a>
    </li>
    <li class="tabs-title"><a href="">Logout</a></li>
</ul>