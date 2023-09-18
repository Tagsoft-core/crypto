@extends('layouts.app')

@section('content')
<div class="section1s">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h1>TRANSFER</h1>
                <h4><i class="fa fa-home"></i> <a href="{{ url('/dashboard') }}">Dashboard</a> / <a href="#">Transfer</a></h4>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</div>
<div class="section2s" data-aos="fade-up" data-aos-duration="500">
    <div class="container">

        <div class="row" >
            <div class="col-md-12 section2ss">
                <h4>{{$wallet->name}}</h4>
            </div>
            <div class="clearfix"></div>
            @include('layouts.alert')
            <div class="col-md-6 section2sa withd" >
                <form action="{{route('make-transfer', $wallet->slug)}}" method="post">
                    @csrf
                    <h2>Your Balance:</h2>
                    <h1>{{$wallet->balanceFloat}} {{strtoupper($wallet->slug)}}</h1>

                    <label for="amount">Amount</label>
                    <input step="any" required name="amount" type="number" placeholder="0.00">

                    <h3>Account Details</h3>

                    <label for="user">User Email</label>
                    <input required name="user" type="email" placeholder="user@example.com">

                    <label for="wallet">User Wallet Slug</label>
                    <input required name="wallet" type="text" placeholder="example: ltc or usdt">

                    <button type="submit">Transfer</button>
                    <button type="reset" class="can">Cancel</button>
                </form>
            </div>
            <div class="col-md-6 bit-sec">
                <img width="60%" src="{{asset($wallet->image)}}">
            </div>
        </div>
    </div>
</div>
<div class="container-fluid h-divider" data-aos="fade-down" data-aos-duration="500">
    <div class="shadow"></div>
    <div class="text" ><i>TRANSACTION HISTORY</i></div>
</div>

<div class="section3s1">
    <div class="container">
        <div class="row" data-aos="fade-down" data-aos-duration="500">
            <!-- <div class="col-md-12 section2ss sec2csa">
                <h4>Transaction History</h4>
            </div> -->
            <!-- <div class="clearfix"></div> -->
            <div class="col-md-12 section2cs" >
                <table id="transaction_table" class="display" style="width:100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Account</th>
                        <th>Wallet</th>
                        <th>Transaction Type</th>
                        <th>Amount</th>
                        <th>Confirmed</th>
                        <th>UUID</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                    $i = 1
                    @endphp
                    @foreach($wallet->transactions as $transaction)
                    @php $color = '';
                    if ($transaction->type == 'deposit'){
                    $color = '#ade6b9';
                    }
                    if ($transaction->type == 'withdraw'){
                    $color = '#e6adad';
                    }
                    @endphp
                    <tr style="background-color: {{$color}}!important;">
                        <td>{{$i}}</td>
                        <td>{{$transaction->created_at}}</td>
                        <td>{{$transaction->wallet->holder->name}}</td>
                        <td>{{$transaction->wallet->name}}</td>
                        <td>{{$transaction->type}}</td>
                        <td>{{$transaction->amount}}</td>
                        <td>{{$transaction->confirmed}}</td>
                        <td>{{$transaction->uuid}}</td>
                    </tr>
                    @php
                    $i++;
                    @endphp
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Account</th>
                        <th>Wallet</th>
                        <th>Transaction Type</th>
                        <th>Amount</th>
                        <th>Confirmed</th>
                        <th>UUID</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
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
