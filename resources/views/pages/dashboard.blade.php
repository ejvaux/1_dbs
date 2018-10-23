@extends('layouts.app2')
@section('pageTitle','Dashboard | DMS - Primatech')
@section('tabTitle','DASHBOARD')
@section('content')
@include('inc.messages')
<div class="container dashb">
    {{-- <div class="row justify-content-center mx-1 mb-2">
        <div class="col-md-6">
            <div class="card">                
                <div class="card-body">
                    <div id="danplalocationdiv2"></div>                  
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div id="danplalocationdiv"></div>                      
                </div>
            </div>
        </div>
    </div> --}}
    <div class="row justify-content-center mx-1 mb-2">
        <div class="col-md">
            <div class="card">                
                <div class="card-body">
                    <div id="danplalocationdiv2"></div>                  
                </div>
            </div>
        </div>        
    </div>
    <div class="row justify-content-center mx-1 mb-2">
        <div class="col-md">
            <div class="card">
                <div class="card-body">
                    <div id="danplalocationdiv"></div>                      
                </div>
            </div>
        </div>        
    </div>
    <div class="row justify-content-center mx-1 mb-2">
        <div class="col-md">
            @include('pages.dashboard.summarytable')
        </div>        
    </div>
    <div class="row justify-content-center mx-1 mb-2">
        <div class="col-md">
            @include('pages.dashboard.danplastatus')
        </div>        
    </div>
    <div class="row justify-content-center mx-1 mb-2">
        <div class="col-md">
            @include('pages.dashboard.danplasize')
        </div>        
    </div>  
</div>
@endsection
@section('graphs')
    {!! \Lava::render('PieChart', 'Locations2', 'danplalocationdiv2') !!}
    {!! \Lava::render('ColumnChart', 'Locations', 'danplalocationdiv') !!}
    {{-- <div id="danplalocationdiv1"></div>                                    
    {!! \Lava::render('BarChart', 'Locations1', 'danplalocationdiv1') !!} --}}
    {{-- <div id="danplalocationdiv3"></div>                                    
    {!! \Lava::render('LineChart', 'Locations3', 'danplalocationdiv3') !!} --}}
@endsection