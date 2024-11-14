@extends('layouts.app')

@section('content')
<style>
    /* Light Pink Background for the Page */
    body {
        background-color: #ffe6e9; /* Light pink background */
        color: #333; /* Dark text color for contrast */
        font-family: Arial, sans-serif;
    }

    /* Centering the Card and Adding Shadow */
    .card {
        background-color: #ffffff;
        border: none;
        border-radius: 8px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        padding: 2rem;
        margin-top: 2rem;
    }

    /* Card Header Styling */
    .card-header {
        background-color: #ff8a9c; /* Darker pink for header */
        color: #ffffff;
        font-size: 1.25rem;
        font-weight: bold;
        text-align: center;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
        padding: 1rem;
    }

    /* Form Labels */
    label {
        color: #d81b60; /* Dark pink for labels */
        font-weight: 500;
    }

    /* Form Inputs */
    .form-control {
        border: 1px solid #f8bbd0; /* Light pink border */
        border-radius: 5px;
        transition: border-color 0.3s;
    }
    .form-control:focus {
        border-color: #ff8a9c; /* Darker pink on focus */
        box-shadow: none;
    }

    /* Checkbox Label */
    .form-check-label {
        color: #d81b60;
    }

    /* Submit Button */
    .btn-primary {
        background-color: #ff8a9c; /* Darker pink button */
        border: none;
        font-weight: bold;
        padding: 0.5rem 2rem;
        transition: background-color 0.3s;
    }
    .btn-primary:hover {
        background-color: #e57373; /* Slightly darker on hover */
    }

    /* Forgot Password Link */
    .btn-link {
        color: #d81b60;
        text-decoration: none;
        font-weight: bold;
    }
    .btn-link:hover {
        color: #ff8a9c;
        text-decoration: underline;
    }

    /* Invalid Feedback Styling */
    .invalid-feedback {
        color: #e57373; /* Light red for error text */
    }
</style>

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
@endsection
