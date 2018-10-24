@extends('layouts.app2')
@section('pageTitle','Scan Barcode | DMS - Primatech')
@section('tabTitle','SCAN BARCODE')
@section('content')
@include('inc.messages')
<div class="container dashb">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href='{{url('/scan/inout')}}'><button class='flatb_admin'><span class='flatb_admin_label'>In/Out Transactions</span><br><i class="fas fa-exchange-alt flatb_admin_icon"></i></button></a>
            <a href='{{url('/scan/scrap')}}'><button class='flatb_admin'><span class='flatb_admin_label'>Scrap</span><br><i class="fas fa-trash flatb_admin_icon"></i></button></a>
        </div>
    </div>
</div>
@endsection