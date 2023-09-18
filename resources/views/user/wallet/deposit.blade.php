@extends('layouts.app')

@section('content')
    <div class="section1s">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <h1>DEPOSIT</h1>
                    <h4><i class="fa fa-home"></i> <a href="{{ url('/dashboard') }}">Dashboard</a> / <a href="#">Deposit</a></h4>
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
                    <form action="{{route('make-deposit', $wallet->slug)}}" method="post">
                        @csrf
                        <h2>Your Balance:</h2>
                        <h1>{{$wallet->balanceFloat}} <br>{{strtoupper($wallet->slug)}}</h1>

                        <label for="amount">Amount</label>
                        <input step="any" required name="amount" type="number">
                        <input type="hidden" name="wallet_slug" value="{{$wallet->slug}}">

                        <h3>Your current wallet account details:</h3>

                        <label for="wallet_slug">Wallet:</label>
                        <h4>{{$wallet->slug}} <small>({{$wallet->name}})</small></h4>
                        <br>

                        <label for="wallet_slug">Your Email:</label>
                        @php
                            $user = Auth::user();
                        @endphp
                        <h4>{{$user->email }}</h4>

                        <hr>
                        <label for="wallet_slug">Depositing To:</label>
                        <h4>{{$wallet->name}} - {{$wallet->slug}}</h4>
                        <br>

                        <button type="submit">Deposit</button>
                        <button type="reset" class="can">Cancel</button>
                    </form>
                    <a href="{{route('request.transaction.logs', $wallet->slug)}}" class="btn btn-dark can text-black">Request Transaction Logs</a>
                    <hr>
                </div>
                <div class="col-md-4 bit-sec" style="padding-top: 170px;">
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

    {{--<div class="container-fluid h-divider" data-aos="fade-down" data-aos-duration="500">--}}
        {{--<div class="shadow"></div>--}}
        {{--<div class="text" ><i>TRANSACTION HISTORY</i></div>--}}
    {{--</div>--}}

    {{--<div class="section3s1">--}}
        {{--<div class="container">--}}
            {{--<div class="row" data-aos="fade-down" data-aos-duration="500">--}}
                {{--<!-- <div class="col-md-12 section2ss sec2csa">--}}
                    {{--<h4>Transaction History</h4>--}}
                {{--</div> -->--}}
                {{--<!-- <div class="clearfix"></div> -->--}}
                {{--<div class="col-md-12 section2cs" >--}}
                    {{--<table id="transaction_table" class="display" style="width:100%">--}}
                        {{--<thead>--}}
                        {{--<tr>--}}
                            {{--<th>#</th>--}}
                            {{--<th>Date</th>--}}
                            {{--<th>Account</th>--}}
                            {{--<th>Wallet</th>--}}
                            {{--<th>Transaction Type</th>--}}
                            {{--<th>Amount</th>--}}
                            {{--<th>Confirmed</th>--}}
                            {{--<th>UUID</th>--}}
                        {{--</tr>--}}
                        {{--</thead>--}}
                        {{--<tbody>--}}
                        {{--@php--}}
                            {{--$i = 1--}}
                        {{--@endphp--}}
                        {{--@foreach($wallet->transactions as $transaction)--}}
                            {{--@php $color = '';--}}
                            {{--if ($transaction->type == 'deposit'){--}}
                            {{--$color = '#ade6b9';--}}
                            {{--}--}}
                            {{--if ($transaction->type == 'withdraw'){--}}
                            {{--$color = '#e6adad';--}}
                            {{--}--}}
                            {{--@endphp--}}
                            {{--<tr style="background-color: {{$color}}!important;">--}}
                                {{--<td>{{$i}}</td>--}}
                                {{--<td>{{$transaction->created_at}}</td>--}}
                                {{--<td>{{$transaction->wallet->holder->name}}</td>--}}
                                {{--<td>{{$transaction->wallet->name}}</td>--}}
                                {{--<td>{{$transaction->type}}</td>--}}
                                {{--<td>{{sprintf('%.2f', $transaction->amount / 100)}}</td>--}}
                                {{--<td>{{$transaction->confirmed}}</td>--}}
                                {{--<td>{{$transaction->uuid}}</td>--}}
                            {{--</tr>--}}
                            {{--@php--}}
                                {{--$i++;--}}
                            {{--@endphp--}}
                        {{--@endforeach--}}
                        {{--</tbody>--}}
                        {{--<tfoot>--}}
                        {{--<tr>--}}
                            {{--<th>#</th>--}}
                            {{--<th>Date</th>--}}
                            {{--<th>Account</th>--}}
                            {{--<th>Wallet</th>--}}
                            {{--<th>Transaction Type</th>--}}
                            {{--<th>Amount</th>--}}
                            {{--<th>Confirmed</th>--}}
                            {{--<th>UUID</th>--}}
                        {{--</tr>--}}
                        {{--</tfoot>--}}
                    {{--</table>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('js/custom/exchanger-rate.js') }}" defer></script>
    <script>
        $(document).ready(function() {
            $('#transaction_table').DataTable();
        } );
    </script>
@endsection
