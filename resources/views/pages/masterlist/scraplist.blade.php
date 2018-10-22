<div class='row mb-1'>
    <div class='col-lg tble'>
        <table class="table table-bordered table-sm">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>@sortablelink('barcode','BARCODE')</th>
                    <th>@sortablelink('code','CODE')</th>
                    <th>@sortablelink('type_id','TYPE')</th>
                    <th>@sortablelink('location_id','LOCATION')</th>
                    <th>@sortablelink('status_id','STATUS')</th>
                </tr>
            </thead>
            <tbody>
                @if (count($scraps)>0)
                    @foreach($scraps as $scrap)
                        <tr>
                            <th>{{ $loop->iteration + (($scraps->currentPage() - 1) * 500) }}</th>
                            <th>{{ $scrap->barcode }}</th>
                            <th>{{ $scrap->code }}</th>
                            <th>{{ $scrap->type->name }}</th>
                            <th> 
                                @if($scrap->location_id != null)
                                {{ $scrap->location->CUSTOMER_NAME }}
                                @endif
                            </th>
                            <th>{{ $scrap->status->name }}</th>                                                       
                        </tr>
                    @endforeach                
                @else
                    <p>No Danpla Found.</p>
                @endif 
            </tbody>
        </table>
    </div>
</div>
<div class='row'>
    <div class='col-md'>
        {!! $scraps->appends(\Request::except('page'))->render() !!}
    </div>
</div>    