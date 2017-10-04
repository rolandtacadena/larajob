@extends('layouts.main')

@section('content')
    <div id="register-page" class="page-content">
        <div class="row">
            <div class="small-12 large-6 medium-8 medium-centered large-centered columns">
                <h4>Register</h4>
                <form method="POST" action="{{ route('register') }}">

                    {{ csrf_field() }}

                    <div class="row">

                        <div class="medium-12 columns">
                            <div class="{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label>Name
                                    <input
                                        id="name"
                                        type="text"
                                        name="name"
                                        value="{{ old('name') }}"
                                        required
                                        autofocus
                                        v-model="name"
                                    >
                                </label>
                                @if ($errors->has('name'))
                                    <span class="form-error is-visible">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="medium-12 columns">
                            <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label>Email Address
                                    <input
                                        id="email"
                                        type="email"
                                        name="email"
                                        value="{{ old('email') }}"
                                        required
                                        v-model="email"
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
                                        required
                                        v-model="password"
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
                            <label>Confirm Password
                                <input
                                    id="password-confirm"
                                    type="password"
                                    name="password_confirmation"
                                    required
                                    v-model="password_confirmation"
                                >
                            </label>
                        </div>

                        <div class="medium-12 columns">
                            <button
                                v-show="name && email && password && password_confirmation"
                                type="submit"
                                class="button expanded"
                            >
                                Register
                            </button>
                            <p>Already have yet? Please <a href="/login">login</a>.</p>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('additional-scripts')
    <script>
        new Vue({
            el: '#register-page',

            data: {
                name: '',
                email: '',
                password: '',
                password_confirmation: '',
            }
        })
    </script>
@endsection