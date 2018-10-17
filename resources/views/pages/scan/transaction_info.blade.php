<div class="card mb-2">
    <div class="card-header">
        <span class='text-muted'>TRANSACTION</span>
    </div>
    <div class="card-body">
        <div class='row'>
            <div class='col-md'>
                <div class='form-group'>
                    <div class="input-group">                    
                        <input type="text" class="form-control" id="scancode" style='max-width:40vh' placeholder="Click here and scan barcode">                
                    </div>
                </div>
            </div>
        </div>
        <form class='' id='incoming_transaction_form' method="POST" action="{{ url('/transact') }}">
            @csrf
            {{-- <input type='hidden' name='type_id' value='1'> --}}
        <div class='row'>
            <div class='col-md'>
                <div class='form-group'>
                    <label for="type_id">TYPE:</label>
                    {{-- <input id='incoming_type' value='INCOMING' class='form-control' readonly> --}}
                    <select name='type_id' id='scan_type_id' class='form-control' required>
                            <option value=''>- SELECT TYPE -</option>
                        @foreach ($types as $type)
                            <option value='{{ $type->id }}'>{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class='row'>
            <div class='col-md'>
                <div class='form-group'>
                    <label for="location_id">LOCATION:</label>
                    <select name='location_id' id='scan_location_id' class='form-control' required>
                            <option value=''>- SELECT LOCATION -</option>
                        @foreach ($locations as $location)
                            <option value='{{ $location->CUSTOMER_ID }}'>{{ $location->CUSTOMER_NAME }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>         
        <div class='row'>
            <div class='col-md'>
                <div class='form-group'>
                    <label for="incoming_type">PERSON-IN-CHARGE:</label>
                    <input id='incoming_type' value='{{ Auth::user()->name }}' class='form-control' readonly>
                </div>
            </div>
        </div>        
        <div class='row mb-2'>
            <div class='col-md'>  
                <button type='button' id='scan_submit_button' class='btn btn-primary'><i class="far fa-share-square"></i> SUBMIT</button>
            </div>
        </div>
        </form>              
    </div>
</div>

{{-- <div class="card">
    <div class="card-header">
        <span class='text-muted'>TRANSACTION INFORMATION</span>
    </div>
    <div class="card-body">
        <div class='row'>
            <div class='col-md'>
                <div class='form-group'>
                    <label for='tran_num'>TRANSACTION #:</label>
                    <input id='tran_num' class='form-control' value='{{
                    (session("success"))?session('success'):''                      
                    }}' readonly>
                </div>                
            </div>
        </div>
        <div class='row'>
            <div class='col-md'>
                <div class='form-group'>
                    <label for='total'>TOTAL SCANNED DANPLA:</label>
                    <input id='total' class='form-control' value='' readonly>
                </div>
            </div>
        </div>
        <div class='row mb-2'>
            <div class='col-md'>
                
            </div>
        </div>              
    </div>
</div> --}}