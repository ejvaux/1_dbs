var clickeddanplarow;

$(document).on('click', '.clickable-row', function(e) {        
    if($(this).hasClass("highlight"))
    {
        $(this).removeClass('highlight');
        clickeddanplarow = 'wala';
        $('.danplalist_btn').prop('disabled', true);
    }        
    else
    {
        $(this).addClass('highlight').siblings().removeClass('highlight');        
        clickeddanplarow = $(this).data('id');
        $('.danplalist_btn').removeAttr("disabled");
    }
    /* alert(clickeddanplarow); */
});

// Add Danpla
$(document).on('click', '#danplaAddButton', function(e) {
    /* alert('ADD'); */
    $('#Adanplalistmod').modal('toggle');
})

// Edit Danpla
$(document).on('click', '#danplaEditButton', function(e) {
    /* $('#danplalistmod').show(); */
    $.ajax({
        type		: "GET",
        url		    : "/1_dms/public/danpla/"+clickeddanplarow+"/edit",
        success		: function(data) {					
                        if(data){
                            /* alert('ok'); */
                            $('#danplalistform').attr('action', '/1_dms/public/danpla/'+clickeddanplarow);
                            $('#barcode').val(data.barcode);
                            $('#code').val(data.code);
                            $('#type_id').val(data.type_id);
                            $('#location_id').val(data.location_id);
                            $('#status_id').val(data.status_id);
                        }                                                                    
                    },
                    /* error : function (jqXHR, textStatus, errorThrown) {							
                            window.location.href = '/1_dms/public/login';
                    } */ //end function
    });//close ajax
    $('#danplalistmod').modal('toggle');
});
$(document).on('click', '#danplaDelButton', function(e) {
    /* alert('DELETE'); */    
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
            $('#Ddanplalistform').attr('action', '/1_dms/public/danpla/'+clickeddanplarow);
            $('#Ddanplalistform').trigger('submit');
        }
        }) 
})

// ********************* TRANSACTION ************************
$(document).on('click', '#transactEditBtn', function(e) {
    /* alert('test'); */
    $.ajax({
        type		: "GET",
        url		    : "/1_dms/public/transaction/"+clickeddanplarow+"/edit",
        success		: function(data) {					
                        if(data){
                            /* alert('ok'); */
                            $('#transactionEditform').attr('action', '/1_dms/public/transaction/'+clickeddanplarow);                            
                            $('#type_id').val(data.type_id);
                            $('#location_id').val(data.location_id);
                        }                                                                   
                    },
                    /* error : function (jqXHR, textStatus, errorThrown) {							
                            window.location.href = '/1_dms/public/login';
                    } */ //end function
    });//close ajax
    $('#transactionEditmod').modal('toggle');
});
$(document).on('click', '#transactViewBtn', function(e) {
    /* alert('TEST'); */
    $.ajax({
        type		: "GET",
        url		    : "/1_dms/public/master/transactiondanpla/"+clickeddanplarow,
        success		: function(html) {					
                        $("#transactionDanplaList").html(html).show('slow');
                        $('#transactionListmod').modal('toggle');
                    },
                    /* error : function (jqXHR, textStatus, errorThrown) {							
                            window.location.href = '/1_dms/public/login';
                    } */ //end function
    });//close ajax    
});

/* ------------------- Search ------------------- */
$('#app').on('click','#search',function(){	
    var tid = $('#searchtextbox').val();
    var url = $(this).data('url');
    /* alert(url); */
    if(tid == ""){
        window.location = url;
    }
    else{
        window.location = url + "/" + tid;
    }									
});
$('#app').on("keyup",'#searchtextbox',function(e) {
    if (e.keyCode == 13) {
        $('#search').trigger('click');
    }
});