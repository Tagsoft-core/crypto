@extends('layouts.app')

@section('content')
    <div class="section1s">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <h1>2FA Verification</h1>
                    <h4><i class="fa fa-home"></i> <a href="{{ url('/login') }}">Sign In</a> / <label>2FA Verification</label></h4>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </div>
    <div class="section2s">
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6" data-aos="fade-up" data-aos-duration="500" style="margin: 20px 0 20px 0;">
                    <form method="POST" action="{{ route('2fa.post') }}">
                        @csrf

                        <p class="text-center">We sent code to email : {{ substr(auth()->user()->email, 0, 5) . '******' . substr(auth()->user()->email,  -2) }}</p>

                        @if ($message = Session::get('success'))
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if ($message = Session::get('error'))
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-danger alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="form-group row mb-0">
                            <label for="code" class="col-md-4 col-form-label text-md-right">Two Factor Code: </label>

                            <div class="col-md-8">
                                <input id="code" type="number" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" required autocomplete="code" autofocus>

                                @error('code')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-4">
                                <a class="btn btn-link" href="{{ route('2fa.resend') }}">Resend Code?</a>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
    <style>
        .invalid-feedback {
            color: red;
        }
    </style>
@endsection