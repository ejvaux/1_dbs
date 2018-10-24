@extends('layouts.app2')
@section('pageTitle','Scrap Masterlist | DMS - Primatech')
@section('tabTitle','SCRAP MASTERLIST')
@section('content')
@include('inc.messages')
<div class="container">
    <div class="row mb-3 mt-0">
        <div class="col-md">
            <a href='{{url('/master')}}' class='btn btn-primary'><i class="fas fa-arrow-left"></i> BACK</a>
            <button id='sdexport_btn' class='btn btn-primary'><i class="far fa-file-excel"></i> Export</button>
            <button id='sdsearch_btn' class='btn btn-primary'><i class="fas fa-search"></i> Advanced Search</button>
        </div>
        <div class='col-md-4 ml-auto'>
            <div class="input-group">                    
                <input value='{{ (empty($stxt)?'':$stxt) }}' type="text" class="form-control" id="searchtextbox" placeholder="Search danpla barcode . . .">
                <button type="button" class='btn btn-primary rounded-0' data-url='{{ url('/master/scrap') }}' id="search"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            @include('pages.masterlist.scraplist')
        </div>
    </div>
</div>
@include('pages.masterlist.scrapexportmodal')
@include('pages.masterlist.scrapsearchmodal')
@endsection