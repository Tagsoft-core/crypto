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
                        <a href="{{route('user.wallets', $user->id)}}">Wallet(s)</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Withdrawal</li>
                </ol>
            </nav>
        </div>
        <div class="content-viewport">
            <div class="row">
                <div class="col-lg-12">
                    @include('layouts.alert')
                    <div class="grid">
                        <p class="grid-header">{{$wallet->name}}</p>
                        <p class="grid-header">Balance: {{$wallet->balance}}</p>
                        <div class="grid-body">
                            <div class="item-wrapper">
                                <div class="row">
                                    <div class="col-md-8 mx-auto">

                                        <form action="{{route('admin.make-withdraw')}}" method="post">
                                            @csrf
                                        <div class="form-group row showcase_row_area">
                                            <div class="col-md-2 showcase_text_area">
                                                <label for="inputType12">Amount</label>
                                            </div>
                                            <div class="col-md-6 showcase_content_area">
                                                <input name="amount" type="number" class="form-control" id="inputType12" placeholder="0" step="any">
                                                <input type="hidden" name="wallet_slug" value="{{$wallet->slug}}">
                                                <input type="hidden" name="user" value="{{$user->id}}">
                                            </div>
                                        </div>
                                        <div class="form-group row showcase_row_area">
                                            <div class="col-md-2 showcase_text_area"></div>
                                            <div class="col-md-10 showcase_content_area">
                                                <button type="submit" class="btn btn-primary w-50 ml-2"> Withdraw</button>
                                            </div>
                                        </div>
                                            <div class="form-group row showcase_row_area">
                                                <div class="col-md-2 showcase_text_area"></div>
                                            <div class="col-md-10 showcase_content_area">
                                                <button type="reset" class="btn btn-outline-light text-gray component-flat w-50 ml-2"> Cancel</button>
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
        </div>
    </div>
@endsection
