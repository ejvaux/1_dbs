@extends('layouts.app2')
@section('pageTitle','Scan | DMS - Primatech')
@section('tabTitle','SCAN DANPLA')
@section('content')
@include('inc.messages')
<div class="container dashb">
    <div class='row mb-2'>
        <div class='col-md'>
            <a href='{{url('/scan')}}' class='btn btn-primary'><i class="fas fa-arrow-left"></i> BACK</a>
        </div>
    </div>
    <div class="row">
        <div class='col-md-5'>            
            <div class='row mb-2'>
                <div class='col-md'>
                    @include('pages.scan.transaction_info')
                </div>
            </div>            
        </div>
        <div class="col-md">
            <div id='inc_list'>
                @include('pages.scan.inc_danplalist')
            </div>            
        </div>
    </div>
</div>
@endsection