@extends('admin.layouts.app')

@section('content')
<div class="page-content-wrapper-inner">
    <div class="viewport-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb has-arrow">
                <li class="breadcrumb-item">
                    <a href="{{route('admin.dashboard')}}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Currencies</li>
            </ol>
        </nav>
    </div>
    <div class="content-viewport">
        <div class="row">
            @include('layouts.alert')

            <div class="col-lg-12">
                <div class="grid">
                    <p class="grid-header">Crypto Currencies </p>
                    <div class="item-wrapper">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Currency</th>
                                    <th>Slug / Code</th>
                                    <th>Symbol</th>
                                    <th>Exchange Rate</th>
                                    <th>Created At</th>
                                    <th>Action</th>

                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                $i=1;
                                @endphp
                                @foreach($currencies as $currency)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td class="d-flex align-items-center border-top-0">
                                        <span>{{$currency->name}}</span>
                                    </td>
                                    <td>{{$currency->code}}</td>
                                    <td>{{$currency->symbol}}</td>
                                    <td >
                                        @if($currency->code === 'USDT')
                                            LTC: <label class="text-success">{{$currency->exchange_rate}}
                                                <i class="mdi mdi-arrow-up"></i></label>
                                        @elseif($currency->code === 'LTC')
                                            USDT: <label class="text-success">{{$currency->exchange_rate}}
                                                <i class="mdi mdi-arrow-up"></i></label>
                                        @endif

                                    </td>
                                    <td>{{$currency->created_at}}</td>
                                    <td>
                                        <a href="{{route('currency.show', $currency->id)}}" type="button" class="btn btn-primary btn-xs text-white">Edit / View
                                        </a>
                                    </td>
                                    <td class="actions">
                                        <i class="mdi mdi-dots-vertical"></i>
                                    </td>
                                </tr>
                                @php
                                    $i++;
                                @endphp
                              @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection