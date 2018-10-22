@extends('layouts.app2')
@section('pageTitle','Danpla Masterlist | DMS - Primatech')
@section('tabTitle','DANPLA MASTERLIST')
@section('content')
@include('inc.messages')
<div class="container">
    <div class="row mb-3 mt-0">
        <div class="col-md">
            <a href='{{url('/master')}}' class='btn btn-primary'><i class="fas fa-arrow-left"></i> BACK</a>            
            @if (Auth::user()->admin == 1)
                <button id='danplaAddButton' class='btn btn-primary'><i class="fas fa-plus-square"></i> ADD</button>
                <button id='danplaEditButton' class='btn btn-primary danplalist_btn' disabled><i class="fas fa-edit"></i> EDIT</button>
                <button id='danplaDelButton' class='btn btn-primary danplalist_btn' disabled><i class="fas fa-minus-circle"></i> DELETE</button>
            @endif
            <button id='export_btn' class='btn btn-primary'><i class="far fa-file-excel"></i> Export</button>           
        </div>
        <div class='col-md-4 ml-auto'>
            <div class="input-group">                    
                <input value='{{ (empty($stxt)?'':$stxt) }}' type="text" class="form-control" id="searchtextbox" placeholder="Search danpla barcode . . .">
                <button type="button" class='btn btn-primary rounded-0' data-url='{{ url('/master/danpla') }}' id="search"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            @include('pages.masterlist.danplalist')
        </div>
    </div>
</div>
<div id='danplamodal'>
    @include('pages.masterlist.danplamodal')
</div>
@include('pages.masterlist.danplaexportmodal')
@endsection