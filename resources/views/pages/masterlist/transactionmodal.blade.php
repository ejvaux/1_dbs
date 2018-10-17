<div class="modal hide fade in" role="dialog" id="transactionEditmod" data-keyboard="true" data-backdrop="static" >
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Transaction Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="transactionEditform"  method="post" action=''>
            @csrf
            @method('PUT')
        <div class="modal-body" style="">
            <!-- ____________ FORM __________________ -->
  
            <div class="form-group row">
                <div class="col-6">
                    <div class="row">
                      <div class="col-5">
                        <label for="type_id" class="col-form-label">TYPE:</label>                  
                      </div>
                      <div class="col-7">
                        {{-- <input id="type_id" type="text" class="form-control form-control-sm" name="type_id" placeholder="" required> --}}
                          <select id="type_id" name='type_id' class='form-control' required>
                              <option value=''>- SELECT TYPE -</option>
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
                    <label for="location_id" class="col-form-label">LOCATION:</label>                  
                  </div>
                  <div class="col-7">
                    {{-- <input id="location_id" type="text" class="form-control form-control-sm" name="location_id" placeholder="" required> --}}                  
                      <select id="location_id" name='location_id' class='form-control'>
                          <option value=''>- SELECT LOCATION -</option>
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
          <button type="submit" class="btn btn-primary" name="submit" id="euserauthsubmit"><i class="far fa-save"></i> Save</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>

<div id='transactionDanplaList'>
    @include('pages.masterlist.transactiondanplalist')
</div>