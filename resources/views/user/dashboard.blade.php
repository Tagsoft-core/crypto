@extends('layouts.app')

@section('content')
    <div class="section1s">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <h1>EXCHANGE</h1>
                    <h4><i class="fa fa-home"></i> <a href="{{ url('/') }}">Home</a> / <a href="#">Exchange</a></h4>
                </div>
                <div style="text-align: right" class="col-md-4">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
                    <h4>TOTAL BALANCE</h4>
                    <h1>0 USD </h1>
                    <i class="fa fa-sync"></i>
                    <h6>WALLETS</h6>
                    @foreach($wallet as $item)
                        @if($item !== null )
                            <div class="box1">
                                <h4>{{$item->name}}</h4>
                                <h2>{{$item->balanceFloat}} {{strtoupper($item->slug)}}</h2>
                                {{--<h2>= 0 USD</h2>--}}
                                {{--<p>1 BTC = 0.999798</p>--}}
                                <div class="row">
                                    <div class="col-md-3">
                                        <a style="text-decoration: none;" href="{{route('deposit', $item->slug)}}"><b style="color: white">Deposit</b></a>
                                    </div>
                                    <div class="col-md-3">
                                        <a style="text-decoration: none;" href="{{route('withdraw', $item->slug)}}"><b style="color: white">Withdraw</b></a>
                                    </div>

                                    {{--<div class="col-md-3">--}}
                                        {{--<a style="text-decoration: none;" href="{{route('transfer', $item->slug)}}"><b style="color: white">Transfer</b></a>--}}
                                    {{--</div>--}}
                                    <div class="col-md-3">
                                        <a style="text-decoration: none;" href="{{route('exchange', $item->slug)}}"><b style="color: white">Exchange</b></a>
                                    </div>
                                </div>

                            </div>
                        @endif
                    @endforeach

                </div>
                <div class="col-md-6" data-aos="fade-right" data-aos-duration="500">
                    <form id="exchanger-form" action="#" method="post">
                        <h2>Enter amounts to exchange</h2>

                        <div style="display: flex;padding-left: 15px;" class="row">
                            <label id="from-label" class="label-exchange">USDT</label>
                            <i id="swipe-currency" data-from="USDT" data-to="LTC" class="fa fa-exchange"></i>
                            <label id="to-label" class="label-exchange">LTC</label>
                        </div>

                        <label for="from">Amount</label>
                        <input id="amount" name="amount" type="number">
                        <input id="from" name="from" value="USDT" type="hidden">
                        <input id="to" name="to" value="LTC" type="hidden">

                        <label id="from_label">1 USDT</label>
                        <p>equals</p>
                        <label id="to_label">0.006928 Lite Coin</label>

                        <p>Please note that we provide best exchange rates <i class="fa fa-question-circle"></i></p>
                        <button type="submit">Exchange</button>
                    </form>
                </div>
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
    <script src="{{ asset('js/custom/exchanger-rate.js') }}" defer></script>
@endsection
