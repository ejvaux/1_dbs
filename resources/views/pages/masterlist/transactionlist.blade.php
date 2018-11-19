<div class='row mb-1'>
    <div class='col-lg tble'>
        <table class="table table-bordered table-sm">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>@sortablelink('number','TRANSACTION #')</th>
                    <th>@sortablelink('type_id','TYPE')</th>
                    <th>@sortablelink('location_id','LOCATION')</th>
                    <th>@sortablelink('quantity','TOTAL')</th>
                    <th>@sortablelink('pic_id','PIC')</th>
                    <th>@sortablelink('created_at','CREATED AT')</th>
                </tr>
            </thead>
            <tbody>
                @if (count($transactions)>0)
                    @foreach($transactions as $transaction)
                        <tr class='clickable-row' data-id='{{ $transaction->id }}'>
                            <td>{{ $loop->iteration + (($transactions->currentPage() - 1) * 500) }}</td>
                            <td>{{ $transaction->number }}</td>
                            <td>{{ $transaction->type->name }}</td>
                            <td> 
                                @if($transaction->location_id != null)
                                {{ $transaction->location->CUSTOMER_NAME }}
                                @endif
                            </td>
                            <td>{{ $transaction->quantity }}</td>
                            <td>{{ $transaction->user->name }}</td>
                            <td>{{ $transaction->created_at }}</td>                                                                                    
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
        {!! $transactions->appends(\Request::except('page'))->render() !!}
    </div>
</div>    