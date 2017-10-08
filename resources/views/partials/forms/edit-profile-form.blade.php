<form method="POST" action="{{ route('employer-update-profile', $authUser) }}" enctype="multipart/form-data">

    {{ csrf_field() }}

    <fieldset class="fieldset">
        <legend>User Profile</legend>
        <div class="row">
            <div class="medium-12 columns">
                <label>Name
                    <input
                        name="name"
                        type="text"
                        value="{{ $authUser->name }}"
                        placeholder="name"
                        class="{{ $errors->has('name') ? 'hasError' : '' }}"
                    >
                </label>
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </fieldset>

    <fieldset class="fieldset">
        <legend>Company Information</legend>
        <div class="row">

            <div class="medium-6 columns">
                <label>Company Name
                    <input
                        name="company_name"
                        type="text"
                        value="{{ $authUser->company_name }}"
                        placeholder="Name"
                        class="{{ $errors->has('company_name') ? 'hasError' : '' }}"
                    >
                </label>
                @if ($errors->has('company_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('company_name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="medium-6 columns">
                <label>Company Tagline
                    <input
                        name="company_tagline"
                        type="text"
                        value="{{ $authUser->company_tagline }}"
                        placeholder="Company Tagline"
                    >
                </label>
            </div>

        </div>
        <div class="row">

            <div class="medium-6 columns">
                <label>Company Web URL
                    <input
                        name="company_web_url"
                        type="text"
                        value="{{ $authUser->company_web_url }}"
                        placeholder="Web Url"
                        class="{{ $errors->has('company_web_url') ? 'hasError' : '' }}"
                    >
                </label>
                @if ($errors->has('company_web_url'))
                    <span class="help-block">
                        <strong>{{ $errors->first('company_web_url') }}</strong>
                    </span>
                @endif
            </div>

            <div class="medium-6 columns">
                <label>Company Logo
                    <input
                        name="company_logo"
                        type="file"
                        value="{{ $authUser->company_logo }}"
                    >
                </label>
                @if ($errors->has('company_logo'))
                    <span class="help-block">
                        <strong>{{ $errors->first('company_logo') }}</strong>
                    </span>
                @endif
            </div>

        </div>
    </fieldset>

    <div class="row">
        <div class="small-12 columns">
            <button type="submit" class="button dark">Update Profile</button>
        </div>
    </div>

</form>