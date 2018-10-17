@extends('layouts.app2')
@section('pageTitle','Admin | DMS - Primatech')
@section('tabTitle','ADMIN')
@section('content')
@include('inc.messages')
<div class="container">
    <div class="row mb-3">
        <div class='col-md-3'>
            <a href='{{ url('/admin') }}' class='btn btn-primary '><i class="fas fa-arrow-left"></i> Go Back</a>
            <a href='{{ url('/adduser') }}' class='btn btn-primary '><i class="fas fa-user-plus"></i> Add User</a>
        </div>
        <div class='col-md-3 pl-0 ml-0'>
            <div class="input-group">                    
                <input type="text" class="form-control" id="searchtextbox" placeholder="Search user . . .">
                <button type="button" class='btn btn-primary rounded-0' value="" id="search"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </div>
    <div class='row'>
        <div class='col-md-5'>
            <div class='col-lg tble'>
                <table class="table table-bordered" id="myTable">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>@sortablelink('name','NAME')</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($users)>0)
                            @foreach($users as $user)
                                
                                <tr>
                                    <th>{{ $loop->iteration + (($users->currentPage() - 1) * 10) }}</th>
                                    <th><a class='userinfo_name' href='#' data-id='{{ $user->id }}'>{{ $user->name }}</a></th>                                                                           
                                    <th>
                                        @if (Auth::user()->id != $user->id)
                                            <button type='button' class='btn btn-danger p-1 py-0 users_delete_btn' data-id='{{ $user->id }}'><i class="fas fa-trash"></i></button>
                                        @endif                                        
                                        <form method="POST" id='users_delete_form{{$user->id}}' action='{{ url('/users/'.$user->id) }}'>
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    </th>                                    
                                </tr>           
                            @endforeach                
                        @else
                            <p>No Users Found.</p>
                        @endif
                    </tbody>
                </table>
            </div>
            {!! $users->appends(\Request::except('page'))->render() !!}
        </div>
        <div class='col-md'>
            <div id='user_info'>
                @include('inc.userinfo')
            </div>
        </div>
    </div>
    <div class='row'>
        <div class='col-md'>
            
        </div>
    </div>
</div>
@endsection