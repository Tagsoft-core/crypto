@extends('layouts.app')

@section('content')
    <div class="section1s">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <h1>WITHDRAWAL</h1>
                    <h4><i class="fa fa-home"></i> <a href="{{ url('/dashboard') }}">Dashboard</a> / <a href="#">Withdraw</a></h4>
                </div>
                <div class="col-md-4"></div>

            </div>
        </div>
    </div>
    <div class="section2s" data-aos="fade-up" data-aos-duration="500">
        <div class="container">
            @include('layouts.alert')
            <div class="row" >
                <div class="col-md-12 section2ss"  >
                    <h4>{{$wallet->name}}</h4>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-8 section2sa withd" >
                    <form action="{{route('make-withdraw')}}" method="post">
                        @csrf
                        <h2>Your Balance:</h2>
                        <h1>{{$wallet->balanceFloat}} <br>{{strtoupper($wallet->slug)}}</h1>

                        @if($errors->has('error'))
                            <div class="alert-danger">{{ $errors->first('error') }}</div>
                        @endif

                        <label for="amount">Amount</label>
                        <input step="any" required name="amount" type="number">
                        @if($errors->has('amount'))
                            <div class="alert-danger">{{ $errors->first('amount') }}</div>
                        @endif

                        <label for="wallet_slug">Withdrawing from:</label>
                        <h4>{{$wallet->name}} - {{$wallet->slug}}</h4>
                       <br>

                        <input type="hidden" name="wallet_slug" value="{{$wallet->slug}}">
                        <button type="submit">Withdraw</button>
                        <button type="reset" class="can">Cancel</button>
                    </form>
                    <a href="{{route('request.transaction.logs', $wallet->slug)}}" class="btn btn-dark can text-black">Request Transaction Logs</a>
                    <hr>
                </div>
                <div class="col-md-4 bit-sec">
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
