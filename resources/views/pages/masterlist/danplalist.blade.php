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
                    {{-- <th>@sortablelink('condition_id','CONDITION')</th> --}}
                    <th>@sortablelink('status_id','STATUS')</th>
                    {{-- <th>@sortablelink('created_at','CREATED_AT')</th>
                    <th>@sortablelink('updated_at','UPDATED_AT')</th> --}}
                </tr>
            </thead>
            <tbody>
                @if (count($danplas)>0)
                    @foreach($danplas as $danpla)
                        <tr class='clickable-row' data-id='{{ $danpla->id }}'>
                            <td>{{ $loop->iteration + (($danplas->currentPage() - 1) * 500) }}</td>
                            <td>{{ $danpla->barcode }}</td>
                            <td>{{ $danpla->code }}</td>
                            <td>{{ $danpla->type->name }}</td>
                            <td> 
                                @if($danpla->location_id != null)
                                {{ $danpla->location->CUSTOMER_NAME }}
                                @endif
                            </td>
                            {{-- <td>{{ $danpla->condition->name }}</td> --}}
                            <td>{{ $danpla->status->name }}</td>
                            {{-- <th>{{ $danpla->created_at }}</th>
                            <th>{{ $danpla->updated_at }}</th> --}}                                                           
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
        {!! $danplas->appends(\Request::except('page'))->render() !!}
    </div>
</div>    