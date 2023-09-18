@extends('admin.layouts.app')

@section('content')
    <div class="page-content-wrapper-inner">
        <div class="viewport-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb has-arrow">
                    <li class="breadcrumb-item">
                        <a href="{{route('admin.dashboard')}}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{route('users')}}">Users</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Wallets</li>
                </ol>
            </nav>
        </div>
        <div class="content-viewport">
            <div class="row">
                @include('layouts.alert')
            </div>
            <div class="row">
                @php
                    $color = 'success';
                @endphp
                @foreach($wallets as $wallet)
                    <div class="col-lg-6 col-md-6 col-sm-12 equel-grid">
                        <div class="grid">
                            <div class="grid-body">
                                <div class="split-header">
                                    <p class="card-title">Available Balance</p>
                                    <span class="btn action-btn btn-xs component-flat" data-toggle="tooltip" data-placement="left" title="Available balance since the last week">
                        <i class="mdi mdi-information-outline text-muted mdi-2x"></i>
                      </span>
                                </div>
                                <div class="d-flex align-items-end mt-2">
                                    <h3>{{$wallet->balance}}</h3>
                                    <p class="ml-1 font-weight-bold">{{$wallet->currency}}</p>
                                </div>
                                <div class="d-flex mt-2">
                                    @foreach($currencies as $currency)
                                        @if(strtoupper($wallet->slug) != $currency->code)
                                            <div class="wrapper d-flex pr-4">
                                                <small class="text-gray mr-2">Exchange Rate:</small>
                                                <small class="text-{{$color}} font-weight-medium mr-2">{{$currency->code}}</small>
                                                <small class="text-gray">{{$currency->exchange_rate}}</small>

                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="d-flex flex-row mt-4 mb-4">
                                    <a href="{{route('admin.withdraw', [$wallet->slug, $user])}}" class="btn btn-outline-light text-gray component-flat w-50 mr-2" type="button">WITHDRAW</a>
                                    <a href="{{route('admin.deposit', [$wallet->slug, $user])}}" class="btn btn-primary w-50 ml-2" type="button">DEPOSIT</a>
                                </div>
                                <div class="d-flex mt-5 mb-3">
                                    <small class="mb-0 text-primary">Transactions </small>
                                </div>
                                @php
                                    $i=1;
                                @endphp
                                @foreach($wallet->transactions as $transaction)
                                    @php
                                        if ($wallet->id !== $transaction->wallet_id){ continue;}
                                    @endphp
                                    <div class="d-flex justify-content-between border-bottom py-2">
                                        <p class="text-black">{{ucfirst($transaction->type)}} {{$wallet->currency}}</p>
                                        <p class="text-gray">{{$transaction->amount}} {{$wallet->currency}}</p>
                                    </div>

                                    @php
                                        $color = 'primary';
                                            $i++;
                                    @endphp
                                @endforeach

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
