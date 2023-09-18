@extends('admin.layouts.app')

@section('content')
    <div class="page-content-wrapper-inner">
        <div class="viewport-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb has-arrow">
                    <li class="breadcrumb-item">
                        <a href="{{route('admin.dashboard')}}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Users</li>
                </ol>
            </nav>
        </div>
        <div class="content-viewport">
            <div class="row">
                @include('layouts.alert')

                <div class="col-lg-12">
                    <div class="grid">
                        <p class="grid-header">Users List </p>
                        <div class="item-wrapper">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>DOB</th>
                                        <th>Created At</th>
                                        <th>Action</th>

                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $i=1;
                                    @endphp
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td class="d-flex align-items-center border-top-0">
                                                <span>{{$user->name}}</span>
                                            </td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->phone}}</td>
                                            <td>{{$user->dob}}</td>
                                            <td>{{$user->created_at}}</td>
                                            <td>
                                                <a href="{{route('user.show', $user->id)}}" type="button" class="btn btn-primary btn-xs text-white">Edit / View
                                                </a>
                                                <a href="{{route('user.wallets', $user->id)}}" type="button" class="btn btn-success btn-xs text-white">Wallets
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