<div class="modal hide fade in" role="dialog" id="transactionsearchmod" data-keyboard="true" data-backdrop="static" >
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Search Transaction Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="transactionsearchform"  method="GET" action='{{ url('/master/advance/transaction') }}'>
            @csrf
        <div class="modal-body" style="">
            <!-- ____________ FORM __________________ -->
  
            <div class="form-group row">
                <div class="col-6">
                    <div class="row">
                      <div class="col-5">
                        <label for="xnumber" class="col-form-label">TRANSACTION #:</label>                  
                      </div>
                      <div class="col-7">
                        <input id="xnumber" type="text" class="form-control form-control-sm" name="xnumber" placeholder="">                                         
                      </div>
                    </div>
                  </div>
              <div class="col-6">
                <div class="row">
                  <div class="col-5">
                    <label for="xpic_id" class="col-form-label">PIC:</label>
                  </div>
                  <div class="col-7">
                    {{-- <input id="location_id" type="text" class="form-control form-control-sm" name="location_id" placeholder="" required> --}}                  
                      <select id="xpic_id" name='xpic_id' class='form-control'>
                          <option value=''>NONE</option>
                          @if (!empty($pics))
                            @foreach ($pics as $pic)
                                <option value='{{$pic->id}}'>{{$pic->name}}</option>
                            @endforeach
                          @endif                          
                      </select>  
                  </div>
                </div>
              </div>                    
            </div>

            <div class="form-group row">
                <div class="col-6">
                    <div class="row">
                      <div class="col-5">
                        <label for="xtype_id" class="col-form-label">TYPE:</label>                  
                      </div>
                      <div class="col-7">
                        {{-- <input id="type_id" type="text" class="form-control form-control-sm" name="type_id" placeholder="" required> --}}
                          <select id="xtype_id" name='xtype_id' class='form-control' >
                              <option value=''>NONE</option>
                              @foreach ($t_types as $t_type)
                                  <option value='{{$t_type->id}}'>{{$t_type->name}}</option>
                              @endforeach
                          </select>                 
                      </div>
                    </div>
                  </div>
              <div class="col-6">
                <div class="row">
                  <div class="col-5">
                    <label for="xlocation_id" class="col-form-label">LOCATION:</label>                  
                  </div>
                  <div class="col-7">
                    {{-- <input id="location_id" type="text" class="form-control form-control-sm" name="location_id" placeholder="" required> --}}                  
                      <select id="xlocation_id" name='xlocation_id' class='form-control'>
                          <option value=''>NONE</option>
                          @foreach ($locations as $location)
                              <option value='{{$location->CUSTOMER_ID}}'>{{$location->CUSTOMER_NAME}}</option>
                          @endforeach
                      </select>  
                  </div>
                </div>
              </div>                    
            </div>            
  
            <!-- ____________ FORM END __________________ -->
          
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="submit" id="euserauthsubmit"><i class="fas fa-search"></i> Search</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>