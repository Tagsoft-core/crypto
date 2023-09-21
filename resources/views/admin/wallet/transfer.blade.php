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
                                                    <label for="inputAmount">Amount</label>
                                                </div>
                                                <div class="col-md-9 showcase_content_area">
                                                    <input name="amount" type="number" class="form-control form-control-lg" id="inputAmount" value="0" step="any">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group row showcase_row_area">
                                                <div class="col-md-3 showcase_text_area">
                                                    <label for="inputEmail">User Email</label>
                                                </div>
                                                <div class="col-md-9 showcase_content_area">
                                                    <input name="email" type="email" class="form-control" id="inputEmail">
                                                </div>
                                            </div>
                                            <div class="form-group row showcase_row_area">
                                                <div class="col-md-3 showcase_text_area">
                                                    <label for="inputType14">Small</label>
                                                </div>
                                                <div class="col-md-9 showcase_content_area">
                                                    <input type="text" class="form-control form-control-sm" id="inputType14" value="Sara Watson">
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-sm btn-primary">Sign in</button>
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