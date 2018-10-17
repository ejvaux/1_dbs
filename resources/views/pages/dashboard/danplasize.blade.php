<div class="card mb-2">
    <div class="card-header"><span class='text-muted font-weight-bold'>DANPLA SIZES</span></div>
    <div class="card-body container p-0">
        <div class="row">
            <div class="col-md">
                <div class="card">            
                    <div class="card-body">    
                        <h5><span class='text-muted'>{{ $d_type[0]->name }}</span></h5>
                        <table class="table table-bordered table-sm m-0" id="myTable">
                            <thead class="thead-light">
                                <tr>
                                    <th>COMPANY NAME</th>
                                    <th>DANPLA QTY</th>
                                    {{-- <th>CURRENT LOCATION</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($d_type1)>0)
                                    @foreach($d_type1 as $d_type1a)                                        
                                        <tr>
                                            <td>{{ $d_type1a->location}}</td>
                                            <td>{{ $d_type1a->total }}</td>                                                                                
                                        </tr>           
                                    @endforeach                
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
                        <h5><span class='text-muted'>{{ $d_type[1]->name }}</span></h5>
                        <table class="table table-bordered table-sm m-0" id="myTable">
                            <thead class="thead-light">
                                <tr>
                                    <th>COMPANY NAME</th>
                                    <th>DANPLA QTY</th>
                                    {{-- <th>CURRENT LOCATION</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($d_type1)>0)
                                    @foreach($d_type2 as $d_type1a)                                        
                                        <tr>
                                            <td>{{ $d_type1a->location}}</td>
                                            <td>{{ $d_type1a->total }}</td>                                                                                
                                        </tr>           
                                    @endforeach                
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
                        <h5><span class='text-muted'>{{ $d_type[2]->name }}</span></h5>
                        <table class="table table-bordered table-sm m-0" id="myTable">
                            <thead class="thead-light">
                                <tr>
                                    <th>COMPANY NAME</th>
                                    <th>DANPLA QTY</th>
                                    {{-- <th>CURRENT LOCATION</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($d_type1)>0)
                                    @foreach($d_type3 as $d_type1a)                                        
                                        <tr>
                                            <td>{{ $d_type1a->location}}</td>
                                            <td>{{ $d_type1a->total }}</td>                                                                                
                                        </tr>           
                                    @endforeach                
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
                        <h5><span class='text-muted'>{{ $d_type[3]->name }}</span></h5>
                        <table class="table table-bordered table-sm m-0" id="myTable">
                            <thead class="thead-light">
                                <tr>
                                    <th>COMPANY NAME</th>
                                    <th>DANPLA QTY</th>
                                    {{-- <th>CURRENT LOCATION</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($d_type1)>0)
                                    @foreach($d_type4 as $d_type1a)                                        
                                        <tr>
                                            <td>{{ $d_type1a->location}}</td>
                                            <td>{{ $d_type1a->total }}</td>                                                                                
                                        </tr>           
                                    @endforeach                
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