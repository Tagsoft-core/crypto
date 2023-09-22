@extends('layouts.app')

@section('content')
    <div class="section1s">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <h1>EXCHANGE</h1>
                    <h4><i class="fa fa-home"></i> <a href="{{ url('/') }}">Home</a> / <a href="#">Profile</a></h4>
                </div>
                <div style="text-align: right" class="col-md-4">
                    <h4><i class="fa fa-user"></i> <a href="{{route('profile.index')}}">Profile</a></h4>
                    <i class="fa fa-sign-out"></i><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="section2s" style="padding: 85px 0px;" >
        <div class="container">
            <div class="row">
                @include('layouts.alert')
                <div class="col-md-6 section2sa" data-aos="fade-left" data-aos-duration="500">
                    <h6>User Details</h6>
                    <div class="box1">
                       <h4> <label>Name: </label> {{$user->name}}</h4>
                        <h2> <label>Email: </label>  {{$user->email}} </h2>
                        <h4> <label>Phone: </label>  {{$user->phone}}</h4>
                        <h2> <label>Date Of Birth: </label> {{$user->dob}} </h2>

                        {{--<a href="{{route('profile.destroy', $user)}}" class="btn btn-danger text-white" style="color: white; background-color: #ff0700">Delete Account</a>--}}
                    </div>
                </div>
                <div class="col-md-6" data-aos="fade-right" data-aos-duration="500">
                    <form id="exchanger-form" action="{{route('profile.update', $user)}}" method="post">
                        @csrf
                        <h2>Enter details to update</h2>

                        <label for="from">Name: </label>
                        <input name="name" type="text" value="{{$user->name}}">
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif

                        <label for="from">Email: </label>
                        <input name="" readonly type="text" value="{{$user->email}}">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif

                        <label for="from">Phone: </label>
                        <input name="phone" type="number" value="{{$user->phone}}">
                        @if ($errors->has('phone'))
                            <span class="help-block">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif

                        <label for="from">Date of Birth: </label>
                        <input name="dob" type="date" value="{{$user->dob}}">
                        @if ($errors->has('dob'))
                            <span class="help-block">
                                <strong>{{ $errors->first('dob') }}</strong>
                            </span>
                        @endif

                        <button type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
