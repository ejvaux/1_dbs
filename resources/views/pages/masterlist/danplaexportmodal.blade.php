<div class="modal hide fade in" role="dialog" id="danplaexportmod" data-keyboard="true" data-backdrop="static" >
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Export Danpla Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="danplaexportform"  method="GET" action='{{ url('/master/danpla/export/all') }}'>
            @csrf
        <div class="modal-body" style="">
            <!-- ____________ FORM __________________ -->

            {{-- <div class="row">
                <div class="col-md col-form-label">
                    <span>Note: Leave the fields </span>
                </div>
            </div>  --}}        

            <div class="form-group row">
              <div class="col-6">
                <div class="row">
                  <div class="col-5">
                    <label for="barcode" class="col-form-label">BARCODE:</label>                  
                  </div>
                  <div class="col-7">
                    <input id="barcode" type="text" class="form-control form-control-sm" name="barcode" placeholder="">                  
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="row">
                  <div class="col-5">
                    <label for="code" class="col-form-label">CODE:</label>                  
                  </div>
                  <div class="col-7">
                    <input id="code" type="text" class="form-control form-control-sm" name="code" placeholder="">                  
                  </div>
                </div>
              </div>                    
            </div>

            <div class="form-group row">
                <div class="col-6">
                  <div class="row">
                    <div class="col-5">
                      <label for="type_id" class="col-form-label">TYPE:</label>                  
                    </div>
                    <div class="col-7">
                      {{-- <input id="type_id" type="text" class="form-control form-control-sm" name="type_id" placeholder="" required> --}}
                        <select id="type_id" name='type_id' class='form-control'>
                            <option value=''>NONE</option>
                            @foreach ($d_types as $d_type)
                                <option value='{{$d_type->id}}'>{{$d_type->name}}</option>
                            @endforeach
                        </select>                 
                    </div>
                  </div>
                </div>
                <div class="col-6">
                  <div class="row">
                    <div class="col-5">
                      <label for="location_id" class="col-form-label">LOCATION:</label>                  
                    </div>
                    <div class="col-7">
                      {{-- <input id="location_id" type="text" class="form-control form-control-sm" name="location_id" placeholder="" required> --}}                  
                        <select id="location_id" name='location_id' class='form-control'>
                            <option value=''>NONE</option>
                            @foreach ($locations as $location)
                                <option value='{{$location->CUSTOMER_ID}}'>{{$location->CUSTOMER_NAME}}</option>
                            @endforeach
                        </select>  
                    </div>
                  </div>
                </div>                    
              </div>

              <div class="form-group row">                
                <div class="col-6">
                  <div class="row">
                    <div class="col-5">
                      <label for="status_id" class="col-form-label">STATUS:</label>                  
                    </div>
                    <div class="col-7">
                      {{-- <input id="status_id" type="text" class="form-control form-control-sm" name="status_id" placeholder="" required> --}}                  
                        <select id="status_id" name='status_id' class='form-control'>
                            <option value=''>NONE</option>
                            @foreach ($d_statuses as $d_status)
                                <option value='{{$d_status->id}}'>{{$d_status->name}}</option>
                            @endforeach
                        </select> 
                    </div>
                  </div>
                </div>                                   
              </div>
  
            <!-- ____________ FORM END __________________ -->
          
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="submit" id="euserauthsubmit"><i class="far fa-file-excel"></i> Export</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
        </div>
        </form>
      </div>
    </div>
</div>  