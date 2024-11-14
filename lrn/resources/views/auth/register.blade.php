@extends('layouts.app')

@section('content')
<style>
    /* Light Blue Background for the Page */
    body {
        background-color: #e0f7fa; /* Light blue background */
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

    /* Header Styling */
    .card-header {
        background-color: #00acc1; /* Darker shade of blue */
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
        color: #00796b; /* Slightly darker blue for labels */
        font-weight: 500;
    }

    /* Form Inputs */
    .form-control {
        border: 1px solid #b2ebf2; /* Light blue border */
        border-radius: 5px;
        transition: border-color 0.3s;
    }
    .form-control:focus {
        border-color: #00acc1; /* Darker blue on focus */
        box-shadow: none;
    }

    /* Submit Button */
    .btn-primary {
        background-color: #00acc1; /* Darker blue button */
        border: none;
        font-weight: bold;
        padding: 0.5rem 2rem;
        transition: background-color 0.3s;
    }
    .btn-primary:hover {
        background-color: #00838f; /* Slightly darker on hover */
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
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
