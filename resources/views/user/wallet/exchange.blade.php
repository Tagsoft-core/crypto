@extends('layouts.app')

@section('content')
    <div class="section1s">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <h1>EXCHANGE </h1>
                    <h4><i class="fa fa-home"></i> <a href="{{ url('/dashboard') }}">Dashboard</a> / <a href="#">Exchange</a>
                    </h4>
                </div>
                <div class="col-md-4"></div>

            </div>
        </div>
    </div>
    <div class="section2s" data-aos="fade-up" data-aos-duration="500">
        <div class="container">
            @include('layouts.alert')
            <div class="row">
                <div class="col-md-12 section2ss">
                    <h4>{{$wallet->name}}</h4>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-6 section2sa withd">
                    <form action="{{route('make-exchange', $wallet->slug)}}" method="post">
                        @csrf
                        <h2>Your Balance:</h2>
                        <h1>{{$wallet->balanceFloat}} {{strtoupper($wallet->slug)}}</h1>

                        <label for="amount">Enter Exchange Amount:</label>
                        <input step="any" required name="amount" type="number">

                        <h3>Account Details</h3>

                        <label for="wallet">Wallet to Exchange with:</label>

                        <select style="width: 100%" class="col-md-12" required name="wallet">
                            <option value="">Select</option>
                            @foreach($userWallets as $key => $userWallet)
                                @if($userWallet->slug !== $wallet->slug)
                                <option value="{{$userWallet->slug}}">{{$userWallet->name}}</option>
                                @endif
                            @endforeach
                        </select>

                        <button type="submit">Exchange</button>
                        <button type="reset" class="can">Cancel</button>
                    </form>
                    <a href="{{route('request.transaction.logs', $wallet->slug)}}" class="btn btn-dark can text-black">Request Transaction Logs</a>
                    <hr>
                </div>
                <div class="col-md-6 bit-sec">
                    @php
                    $image = '';
                        if (strpos($wallet->slug, "usdt") !== false){
                        $image = 'images/usdt.png';
                        } else {
                        $image = 'images/ltc.png';
                        }
                    @endphp
                    <img width="60%" src="{{asset($image)}}">
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('js/custom/exchanger-rate.js') }}" defer></script>
@endsection
