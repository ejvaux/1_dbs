<div class="modal hide fade in" role="dialog" id="transactionListmod" data-keyboard="true" data-backdrop="static" >
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Transaction Danpla List</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="">
            <!-- ____________ FORM __________________ -->
  
            <div class='col-lg tble'>
                <table class="table table-bordered table-sm">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>@sortablelink('barcode','BARCODE')</th>                            
                            <th>@sortablelink('code','CODE')</th>
                            <th>@sortablelink('type_id','TYPE')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($t_danplas))
                            @foreach($t_danplas as $t_danpla)
                                <tr class='clickable-row' data-id='{{ $t_danpla->id }}'>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $t_danpla->danpla->barcode }}</td>
                                    <td>{{ $t_danpla->danpla->code }}</td>
                                    <td>{{ $t_danpla->danpla->type->name }}</td>                                                                                                                       
                                </tr>
                            @endforeach                
                        @else
                            <p>No Danpla Found.</p>
                        @endif
                    </tbody>
                </table>
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