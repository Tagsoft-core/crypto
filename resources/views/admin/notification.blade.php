@extends('admin.layouts.app')

@section('content')
    <div class="page-content-wrapper-inner">
        <div class="viewport-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb has-arrow">
                    <li class="breadcrumb-item">
                        <a href="{{route('admin.dashboard')}}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Notifications</li>
                </ol>
            </nav>
        </div>
        <div class="content-viewport">
            <div class="row">
                @include('layouts.alert')

                <div class="col-lg-12">
                    <div class="grid">
                        <p class="grid-header">Notifications <a href="{{route('admin.notification.mark-read')}}" class="btn btn-secondary float-right"> Mark all read</a></p>

                        <br>
                        <div class="item-wrapper">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Notification</th>
                                        <th>Read at</th>
                                        <th>created at</th>
                                        <th>Action</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $i=1;
                                    @endphp
                                    @foreach($notifications as $notification)
                                        <tr @if(empty($notification->read_at)) style="background: coral;" @endif>
                                            <td>{{$i}}</td>
                                            <td class="d-flex align-items-center border-top-0">
                                                <span>{{$notification->data['data']}}</span>
                                            </td>
                                            <td>{{$notification->read_at}}</td>
                                            <td>{{$notification->created_at}}</td>
                                            <td>
                                                @if(empty($notification->read_at))
                                                <a href="{{route('admin.notification.mark', $notification->id)}}" type="button" class="btn btn-primary btn-xs text-white">Mark Read</a>
                                                    @endif
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
                                {{$notifications->links("pagination::bootstrap-4")}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection