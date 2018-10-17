@extends('layouts.app2')
@section('pageTitle','Masterlist | DMS - Primatech')
@section('tabTitle','MASTERLIST')
@section('content')
@include('inc.messages')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href='{{url('/master/danpla')}}'><button class='flatb_admin'><span class='flatb_admin_label'>Danpla</span><br><i class="fas fa-box flatb_admin_icon"></i></button></a>
            <a href='{{url('/master/transaction')}}'><button class='flatb_admin'><span class='flatb_admin_label'>Transactions</span><br><i class="fas fa-exchange-alt flatb_admin_icon"></i></button></a>
            <a href='{{url('/master/scrap')}}'><button class='flatb_admin'><span class='flatb_admin_label'>Scrap Danpla</span><br><i class="fas fa-trash flatb_admin_icon"></i></button></a>
        </div>
    </div>
</div>
@endsection