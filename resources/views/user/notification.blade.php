@extends('layouts.app')

@section('content')
    <div class="section1s">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <h1>NOTIFICATIONS</h1>
                    <h4><i class="fa fa-home"></i> <a href="{{ url('/dashboard') }}">Home</a> / <a href="#">Notifications</a></h4>
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

                <div class="col-md-12 section2sa" data-aos="fade-left" data-aos-duration="500">
                    <h4>Notifications </h4>
                    <a style="text-decoration: none; text-align: unset" href="{{route('notification.mark-read')}}"><b style="color: #a3479f">Mark all Read</b></a>
                    @foreach($notifications as $notification)
                        <div class="box1">
                            <h2><small style="color: white;">{{$notification->data['data']}}</small></h2>
                            <div class="row">
                                @if(empty($notification->read_at))
                                    <div class="col-md-12">
                                        <a style="text-decoration: none;" href="{{route('notification.mark', $notification->id)}}"><b style="color: white">Mark as Read</b></a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
                {{$notifications->links("pagination::bootstrap-4")}}
            </div>
        </div>
    </div>
    <style>
        .label-exchange{
            padding: 6px;
            border: 1px solid lightgrey;
            margin-bottom: 20px;
            width: 40%;
            text-align: center;
            font-size: 20px;
            font-weight: 600;
        }
        #swipe-currency {
            cursor: pointer;
        }
    </style>
@endsection

@section('scripts')

@endsection
