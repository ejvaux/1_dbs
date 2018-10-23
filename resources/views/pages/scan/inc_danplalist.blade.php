<div class="card">
    <div class="card-header">
        <div class='row'>
            <div class='col-md'>
                <span class='text-muted'>SCANNED DANPLA</span>
            </div>
            <div class='col-md-3 ml-auto'>
                <span class='text-muted'>TOTAL: {{count($danplas)}} danpla/s</span>
            </div>
        </div>        
    </div>
    <div class="card-body">
        <div class='col-lg table-responsive-lg tble2'>
            <table class="table table-bordered table-sm">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>BARCODE</th>
                        <th>TYPE</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($danplas))
                        @foreach($danplas as $danpla)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <th>{{ $danpla->danpla->barcode }}</th>
                                <th>{{ $danpla->danpla->type->name }}</th>
                                <th><button data-id='{{$danpla->id}}' class='btn btn-danger p-1 py-0 del_temp_list'><i class="far fa-trash-alt"></i></button></th>                                                                                       
                            </tr>
                        @endforeach 
                    @else
                        No Scanned Danpla                  
                    @endif 
                </tbody>
            </table>
        </div>
    </div>
</div>