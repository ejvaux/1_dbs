@extends('layouts.app2')
@section('pageTitle','Transaction Masterlist | DMS - Primatech')
@section('tabTitle','TRANSACTION MASTERLIST')
@section('content')
@include('inc.messages')
<div class="container">
    <div class="row mb-3 mt-0">
        <div class="col-md">
            <a href='{{url('/master')}}' class='btn btn-primary'><i class="fas fa-arrow-left"></i> BACK</a>
            @if (Auth::user()->admin == 1)
                <button id='transactEditBtn' class='btn btn-primary danplalist_btn' disabled><i class="fas fa-edit"></i> EDIT</button>
                <button id='transactViewBtn' class='btn btn-primary danplalist_btn' disabled><i class="far fa-eye"></i> VIEW DANPLA</button>
            @endif
            <button id='texport_btn' class='btn btn-primary'><i class="far fa-file-excel"></i> Export</button>
            <button id='tsearch_btn' class='btn btn-primary'><i class="fas fa-search"></i> Advanced Search</button>           
        </div>
        <div class='col-md-4 ml-auto'>
            <div class="input-group">                    
                <input value='{{ (empty($stxt)?'':$stxt) }}' type="text" class="form-control" id="searchtextbox" placeholder="Search transaction # . . .">
                <button type="button" class='btn btn-primary rounded-0' data-url='{{ url('/master/transaction') }}' id="search"><i class="fa fa-search"></i></button>
                
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            @include('pages.masterlist.transactionlist')
        </div>
    </div>
</div>
<div id='danplamodal'>
    @include('pages.masterlist.transactionmodal')
</div>
@include('pages.masterlist.transactionexportmodal')
@include('pages.masterlist.transactionsearchmodal')
@endsection