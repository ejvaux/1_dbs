@extends('layouts.app2')
@section('pageTitle','Admin | DMS - Primatech')
@section('tabTitle','ADMIN')
@section('content')
@include('inc.messages')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href='{{url('/userslist')}}'><button class='flatb_admin'><span class='flatb_admin_label'>Users List</span><br><i class="fas fa-users flatb_admin_icon"></i></button></a>
            {{-- <a href='#'><button class='flatb_admin'><span class='flatb_admin_label'>Edit User</span><br><i class="fas fa-user-edit flatb_admin_icon"></i></button></a> --}}
        </div>
    </div>
</div>
@endsection