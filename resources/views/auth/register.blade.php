@extends('layouts.app')


@section('content')
    <div class="section1s">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <h1>SIGN UP</h1>
                    <h4><i class="fa fa-home"></i>
                        <a href="{{ url('/') }}">Home</a> / <label>Sign Up</label></h4>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </div>
    <div class="section2s">
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8" data-aos="fade-up" data-aos-duration="500">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <label for="name" class="new-form-label col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <label for="email" class="new-form-label col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <label for="email" class="new-form-label col-md-4 col-form-label text-md-right">{{ __('DOB') }}</label>
                        <div class="col-md-6">
                            <input id="datepicker" type="date" class="date form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required autofocus placeholder="Date of Birth">

                            @error('dob')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <label for="name" class="new-form-label col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>
                        <div class="col-md-6">
                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus placeholder="Phone Number">

                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <label for="password" class="new-form-label col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <label for="password-confirm" class="new-form-label col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <!-- <input type="checkbox" name="" id=""> Keep me signed in -->
                        <button type="submit">Sign Up</button>
                    </form>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>

    <style>
        .new-form-label {
            font-size: 14px;
        }

        .section2s input[type="text"], .section2s input[type="password"], .section2s input[type="email"]{
            padding: 18px;
        }

        .section2s input[type="date"]{
            padding: 18px;
            margin-bottom: 20px;
        }
        .invalid-feedback {
            color: red;
        }
    </style>
@endsection
