$(document).on('keypress', '#scancode', function(e) {
    /* alert('test'); */
    var keycode = (e.keyCode ? e.keyCode : e.which);
    if(keycode == '13'){
        /* alert($(this).val()); */
        var bcode = $(this).val();
        $(this).val('');
        $.ajax({
            type		: "POST",
            url		    : "/1_dms/public/templist",
            data        :{
                "_token": $('meta[name="csrf-token"]').attr('content'),
                "barcode": bcode,        
            },
            success		: function(data) {					
                            if(data == 1)
                            {
                                iziToast.error({
                                    message: 'No danpla found.',
                                    position: 'topCenter',
                                });
                            }
                            else if(data == 2)
                            {
                                iziToast.error({
                                    message: 'Danpla already scanned.',
                                    position: 'topCenter',
                                });
                            }
                            else if(data == 0)
                            {
                                iziToast.success({
                                    message: 'Scan Successful!',
                                    position: 'topCenter',
                                    displayMode: 2,
                                }); 
                                loadtemplist();                                                 
                            }
                        },
                        /* error : function (jqXHR, textStatus, errorThrown) {							
                                window.location.href = '/1_dms/public/login';
                        } */ //end function
        });//close ajax        
	}
});

function loadtemplist(){    
    $.ajax({
        type		: "GET",
        url		    : "/1_dms/public/templist1",
        success		: function(html) {					
                        $("#inc_list").html(html).show('slow');                                                                          
                    },
                    /* error : function (jqXHR, textStatus, errorThrown) {							
                            window.location.href = '/1_dms/public/login';
                    } */ //end function
    });//close ajax
}

$(document).on('click', '.del_temp_list', function(e) {
    /* alert($(this).data('id')); */
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.value) {
            $.ajax({
                type		: "DELETE",
                url		    : "/1_dms/public/templist/"+$(this).data('id'),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success		: function(data) {					
                                if(data == 0)
                                {
                                    iziToast.success({
                                        message: 'Delete Successful!',
                                        position: 'topCenter',
                                        displayMode: 2,
                                    }); 
                                    loadtemplist();
                                }
                                else
                                {
                                    iziToast.error({
                                        message: 'An error occurred.',
                                        position: 'topCenter',
                                    });
                                }
                                
                            },
                            /* error : function (jqXHR, textStatus, errorThrown) {							
                                    window.location.href = '/1_dms/public/login';
                            } */ //end function
            });//close ajax
        }
      })    
})
$(document).on('click', '#scan_submit_button', function(e) {
    /* e.stopPropagation();
    e.preventDefault(); */
    /* alert($('#location_id').val()); */    
    swal({
        title: 'Please check Transaction details.',
        html: '<span class="font-weight-bold">Location</span>: '+
        (($('#scan_location_id').val() == '') ? 'No location selected' : $('#scan_location_id option:selected').text())        
        +"<br><span class='font-weight-bold'>Type</span>: "+
        (($('#scan_type_id').val() == '') ? 'No type selected' : $('#scan_type_id option:selected').text()),
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Submit it!'
        }).then((result) => {
        if (result.value) {
            $('#scan_submit_button').prop('disabled', true);
            $('#scan_submit_button').html('PROCESSING...');
            $('#incoming_transaction_form').trigger('submit');
        }
        })           
})

// SCRAP

$(document).on('keypress', '#scanscrap', function(e) {
    /* alert('test'); */
    var keycode = (e.keyCode ? e.keyCode : e.which);
    if(keycode == '13'){
        /* alert($(this).val()); */
        var bcode = $(this).val();
        $(this).val('');
        $.ajax({
            type		: "POST",
            url		    : "/1_dms/public/scraptemp",
            data        :{
                "_token": $('meta[name="csrf-token"]').attr('content'),
                "barcode": bcode,        
            },
            success		: function(data) {					
                            if(data == 1)
                            {
                                iziToast.error({
                                    message: 'No danpla found.',
                                    position: 'topCenter',
                                });
                            }
                            else if(data == 2)
                            {
                                iziToast.error({
                                    message: 'Danpla already scanned.',
                                    position: 'topCenter',
                                });
                            }
                            else if(data == 0)
                            {
                                iziToast.success({
                                    message: 'Scan Successful!',
                                    position: 'topCenter',
                                    displayMode: 2,
                                }); 
                                loadscraptemplist();                                                 
                            }
                        },
                        /* error : function (jqXHR, textStatus, errorThrown) {							
                                window.location.href = '/1_dms/public/login';
                        } */ //end function
        });//close ajax        
	}
});

function loadscraptemplist(){    
    $.ajax({
        type		: "GET",
        url		    : "/1_dms/public/templist2",
        success		: function(html) {					
                        $("#scraptemp").html(html).show('slow');                                                                          
                    },
                    /* error : function (jqXHR, textStatus, errorThrown) {							
                            window.location.href = '/1_dms/public/login';
                    } */ //end function
    });//close ajax
}

$(document).on('click', '.del_scrap_temp', function(e) {
    /* alert($(this).data('id')); */
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.value) {
            $.ajax({
                type		: "DELETE",
                url		    : "/1_dms/public/scraptemp/"+$(this).data('id'),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success		: function(data) {					
                                if(data == 0)
                                {
                                    iziToast.success({
                                        message: 'Delete Successful!',
                                        position: 'topCenter',
                                        displayMode: 2,
                                    }); 
                                    loadscraptemplist();
                                }
                                else
                                {
                                    iziToast.error({
                                        message: 'An error occurred.',
                                        position: 'topCenter',
                                    });
                                }
                                
                            },
                            /* error : function (jqXHR, textStatus, errorThrown) {							
                                    window.location.href = '/1_dms/public/login';
                            } */ //end function
            });//close ajax
        }
      })    
})
$(document).on('click', '#scrap_submit_button', function(e) {
    /* e.stopPropagation();
    e.preventDefault(); */
    /* alert($('#location_id').val()); */    
    swal({
        title: 'Are you sure?.',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Submit it!'
        }).then((result) => {
        if (result.value) {
            $('#scrap_submit_button').prop('disabled', true);
            $('#scrap_submit_button').html('PROCESSING...');
            $('#scrap_danpla_form').trigger('submit');
        }
        })           
})
$(document).on('change', '#scan_type_id', function(e) {
    /* alert('test'); */
    if($(this).val() == 1)
    {
        $('#scan_location_id').val(31);
    }
    else
    {
        $('#scan_location_id').val('');
    }    
});