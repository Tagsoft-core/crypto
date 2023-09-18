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
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </nav>
        </div>
        <div class="content-viewport">
            <div class="row">
                <div class="col-lg-12">
                    @include('layouts.alert')
                    <div class="grid">
                        <p class="grid-header">{{$user->name}}</p>
                        <div class="grid-body">
                            <div class="item-wrapper">
                                <form action="{{route('user.edit', $user->id)}}" method="post">
                                    <div class="row">

                                        @csrf
                                        <div class="col-md-8 mx-auto">
                                            <div class="form-group row showcase_row_area">
                                                <div class="col-md-3 showcase_text_area">
                                                    <label for="inputName">Name</label>
                                                </div>
                                                <div class="col-md-9 showcase_content_area">
                                                    <input name="name" type="text" class="form-control form-control-lg" id="inputName" value="{{$user->name}}">
                                                </div>
                                            </div>
                                            <div class="form-group row showcase_row_area">
                                                <div class="col-md-3 showcase_text_area">
                                                    <label for="inputEmail">Email</label>
                                                </div>
                                                <div class="col-md-9 showcase_content_area">
                                                    <input type="email" class="form-control" id="inputEmail" readonly value="{{$user->email}}">
                                                </div>
                                            </div>
                                            <div class="form-group row showcase_row_area">
                                                <div class="col-md-3 showcase_text_area">
                                                    <label for="inputPhone">Phone</label>
                                                </div>
                                                <div class="col-md-9 showcase_content_area">
                                                    <input name="phone" type="text" class="form-control" id="inputPhone" value="{{$user->phone}}">
                                                </div>
                                            </div>
                                            <div class="form-group row showcase_row_area">
                                                <div class="col-md-3 showcase_text_area">
                                                    <label for="inputDob">Date of Birth </label>
                                                </div>
                                                <div class="col-md-9 showcase_content_area">
                                                    <input name="dob" type="date" class="form-control form-control-sm" id="inputDob" value="{{date('Y-m-d', strtotime($user->dob))}}">
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