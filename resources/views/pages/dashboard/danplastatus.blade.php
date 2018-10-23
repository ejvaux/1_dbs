<div class="card mb-2">
        <div class="card-header"><span class='text-muted font-weight-bold'>DANPLA STATUS</span></div>
        <div class="card-body container p-0">
            <div class="row">
                <div class="col-md">
                    <div class="card">            
                        <div class="card-body">    
                            <h5><span class='text-muted'>IN</span></h5>
                            <table class="table table-bordered table-sm m-0" id="myTable">
                                <thead class="thead-light">
                                    <tr>
                                        <th>LOCATION</th>
                                        <th>DANPLA QTY</th>
                                        {{-- <th>CURRENT LOCATION</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($d_status1)>0)
                                        @foreach($d_status1 as $d_status1a)                                        
                                            <tr>
                                                <td>{{ $d_status1a->location}}</td>
                                                <td>{{ $d_status1a->total }}</td>                                                                                
                                            </tr>           
                                        @endforeach
                                        <tr>
                                            <td><span class="font-weight-bold">TOTAL:</span></td>
                                            <td>
                                                {{$d_status1_total}}
                                            </td>                                                                                
                                        </tr>
                                    @else
                                        <p>No Data Found.</p>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <div class="card">            
                        <div class="card-body">    
                            <h5><span class='text-muted'>OUT</span></h5>
                            <table class="table table-bordered table-sm m-0" id="myTable">
                                <thead class="thead-light">
                                    <tr>
                                        <th>LOCATION</th>
                                        <th>DANPLA QTY</th>
                                        {{-- <th>CURRENT LOCATION</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($d_status2)>0)
                                        @foreach($d_status2 as $d_status2a)                                        
                                            <tr>
                                                <td>{{ $d_status2a->location}}</td>
                                                <td>{{ $d_status2a->total }}</td>                                                                                
                                            </tr>           
                                        @endforeach
                                        <tr>
                                            <td><span class="font-weight-bold">TOTAL:</span></td>
                                            <td>
                                                {{$d_status2_total}}
                                            </td>                                                                                
                                        </tr>               
                                    @else
                                        <p>No Data Found.</p>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </div>