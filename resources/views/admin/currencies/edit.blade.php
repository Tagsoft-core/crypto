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
                    <a href="{{route('currencies')}}">Currencies</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
    </div>
    <div class="content-viewport">
        <div class="row">
            <div class="col-lg-12">
                @include('layouts.alert')
                <div class="grid">
                    <p class="grid-header">{{$currency->name}}</p>
                    <div class="grid-body">
                        <div class="item-wrapper">
                            <form action="{{route('currency.edit', $currency->id)}}" method="post">
                            <div class="row">

                                    @csrf
                                <div class="col-md-8 mx-auto">
                                    <div class="form-group row showcase_row_area">
                                        <div class="col-md-3 showcase_text_area">
                                            <label for="inputName">Name</label>
                                        </div>
                                        <div class="col-md-9 showcase_content_area">
                                            <input readonly type="text" class="form-control form-control-lg" id="inputName" value="{{$currency->name}}">
                                        </div>
                                    </div>
                                    <div class="form-group row showcase_row_area">
                                        <div class="col-md-3 showcase_text_area">
                                            <label for="inputSlug">Slug / Code</label>
                                        </div>
                                        <div class="col-md-9 showcase_content_area">
                                            <input type="text" class="form-control" id="inputSlug" readonly value="{{$currency->code}}">
                                        </div>
                                    </div>
                                    <div class="form-group row showcase_row_area">
                                        <div class="col-md-3 showcase_text_area">
                                            <label for="inputSymbol">Symbol</label>
                                        </div>
                                        <div class="col-md-9 showcase_content_area">
                                            <input name="symbol" type="text" class="form-control" id="inputSymbol" value="{{$currency->symbol}}">
                                        </div>
                                    </div>
                                    <div class="form-group row showcase_row_area">
                                        <div class="col-md-3 showcase_text_area">
                                            <label for="inputexchange_rate">Exchange Rate</label>
                                        </div>
                                        <div class="col-md-9 showcase_content_area">
                                            <input name="exchange_rate" type="number" step="any" class="form-control form-control-sm" id="inputexchange_rate" value="{{$currency->exchange_rate}}">
                                        </div>
                                    </div>
                                    <div class="form-group row showcase_row_area">
                                        <div class="col-md-3 showcase_text_area">
                                            <label for="inputexchange_rate"></label>
                                        </div>
                                        <div class="col-md-9 showcase_content_area">
                                            <button type="submit" class="btn btn-md btn-primary text-center">EDIT</button>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    @endsection