@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify OTP') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register.verifyOtp') }}">
                        @csrf

                        <input type="hidden" name="email" value="{{ session('email') }}">

                        <div class="mb-3">
                            <label for="otp">{{ __('Enter OTP') }}</label>
                            <input id="otp" type="text" class="form-control" name="otp" required maxlength="6">
                        </div>

                        <button type="submit" class="btn btn-primary">Verify OTP</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
