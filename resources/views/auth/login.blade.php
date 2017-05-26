@extends('layouts.main')

@section('content')
    <div id="login-page" class="page-content">
        <div class="row">
            <div class="small-12 large-6 medium-8 medium-centered large-centered columns">
                <h4>Login</h4>
                <form method="POST" action="{{ route('login') }}">

                    {{ csrf_field() }}

                    <div class="row">

                        <div class="medium-12 columns">
                            <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label>Email Address
                                    <input
                                        id="email"
                                        type="email"
                                        name="email"
                                        value="{{ old('email') }}"
                                        placeholder="email"
                                        required
                                        autofocus
                                    >
                                </label>
                                @if ($errors->has('email'))
                                    <span class="form-error is-visible">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="medium-12 columns">
                            <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label>Password
                                    <input
                                        id="password"
                                        type="password"
                                        name="password"
                                        placeholder="password"
                                        required
                                    >
                                </label>
                                @if ($errors->has('password'))
                                    <span class="form-error is-visible">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="medium-12 columns">
                            <label>Remember Me
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            </label>
                        </div>

                        <div class="medium-12 columns">
                            <button type="submit" class="button expanded">Login</button>
                            <a href="{{ route('password.request') }}">Forgot Your Password?</a>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection