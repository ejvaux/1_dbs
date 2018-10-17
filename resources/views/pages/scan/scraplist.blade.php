@extends('layouts.app2')
@section('pageTitle','Scan | DMS - Primatech')
@section('tabTitle','SCAN DANPLA')
@section('content')
@include('inc.messages')
<div class="container">
    <div class='row mb-1'>
        <div class='col-md'>
            <div class='form-group'>
                <div class="input-group">
                    <a href='{{url('/scan')}}' class='btn btn-primary mr-1'><i class="fas fa-arrow-left"></i> BACK</a>
                    <button id='scrap_submit_button' class='btn btn-primary mr-1'><i class="fas fa-trash"></i> SCRAP DANPLA</button>              
                    <input type="text" class="form-control" id="scanscrap" style='max-width:40vh' placeholder="Click here and scan barcode">
                    <form class='' id='scrap_danpla_form' method="POST" action="{{ url('/scrap') }}">
                        @csrf
                    </form>             
                </div>
            </div>            
        </div>
    </div>
    <div class="row">
        <div class='col-md'>            
            <div id='scraptemp'>
                @include('pages.scan.scraptemplist')
            </div>      
        </div>
    </div>
</div>
@endsection
