{{-- @extends('layouts.app') --}}
@extends('auth.layouts.app')


{{-- @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
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
    </div>
</div>
@endsection --}}

@section('content')
<div id="auth">

    <div class="row h-100">
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                

                <div class="auth-logo">
                    <a href="index.html"><img src="{{ asset('dashboard/assets/images/logo/logo.png') }}" alt="Logo"></a>
                </div>
                <h1 class="auth-title">Log in.</h1>
                {{-- <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p> --}}

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group position-relative has-icon-left mb-4">
                        {{-- <input type="text" class="form-control form-control-xl" placeholder="Username"> --}}
                        <input id="email" type="email" class="form-control form-control-xl @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        {{-- <input type="password" class="form-control form-control-xl" placeholder="Password"> --}}
                        <input id="password" type="password" class="form-control form-control-xl @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                    </div>
                    {{-- <div class="form-check form-check-lg d-flex align-items-end">
                        <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label text-gray-600" for="flexCheckDefault">
                            Keep me logged in
                        </label>
                    </div> --}}
                    {{-- <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button> --}}
                    <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button>

                    
                </form>
                <div class="text-center mt-5 text-lg fs-4">
                    <p class="text-gray-600">Don't have an account? <a href="{{ route('register') }}"
                            class="font-bold">Sign
                            up</a>.</p>
                    <p>
                        {{-- <a class="font-bold" href="auth-forgot-password.html">Forgot password?</a>. --}}

                        @if (Route::has('password.request'))
                        {{-- <a class="btn btn-link font-bold" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a> --}}
                    @endif
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div>
            {{-- <div id="auth-right"> --}}
                <img src="{{ asset('dashboard/assets/images/bg/4853433.jpg')}}" alt="" width="100%" height="100%">
            </div>
        </div>
    </div>

</div>
@endsection
