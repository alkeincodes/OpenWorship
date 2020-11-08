@extends('layouts.app')

@section('content')
<div class="login__container">
    <div class="login__left">
        <h5 class="site-logo">Open Worship</h5>
        <div class="login-fields__container">
            <h3>Log in.</h3>
            <p class="mt-1">Welcome! Please login to your account to continue</p>
            <div class="login-fields__forms mt-2">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="el-form-item @error('email') is-error @enderror">
                        <div class="el-input">
                            <input
                                id="email"
                                type="email"
                                class="el-input__inner"
                                name="email" value="{{ old('email') }}"
                                autocomplete="email"
                                placeholder="Email address"
                                required
                                autofocus
                            >

                            @error('email')
                                <span class="el-form-item__error" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="el-input">
                        <input
                            id="password"
                            type="password"
                            class="el-input__inner
                            @error('password') is-error @enderror"
                            autocomplete="current-password"
                            placeholder="Password"
                            name="password"
                            required
                        >

                        @error('password')
                            <span class="el-form-item__error" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div> --}}

                    <div class="form-group">
                        <button type="submit" class="el-button el-button--primary btn-login full-width">
                            {{ __('Login') }}
                        </button>
                    </div>
                    <div class="text-center mt-1">
                        Don't have an account? <a href="/register" class="btn-link">Sign up.</a><br>
                        @if (Route::has('password.request'))
                            <a class="btn-link mt-2" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="login__right">
        <icon-login-page></icon-login-page>
        <p class="mt-4">Make your church presentation easy.</p>
    </div>
    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
</div>
@endsection
