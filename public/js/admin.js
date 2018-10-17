// User Information Card
/* $('#myTable').on('click', '.clickable-row', function(e) {
    $(this).addClass('selected').siblings().removeClass('selected'); 
}); */

$('#user_info').on('click', '#userinfo_edit', function(e) {

    $('.userinfo_disabled').show();
    $('.userinfo_label').hide();    
});

$('#user_info').on('click', '#userinfo_cancel', function(e) {
    $('.userinfo_disabled').hide();
    $('.userinfo_label').show();    
});

$('#myTable').on('click', '.userinfo_name', function(e) {
    /* alert($(this).data('id')); */
    $.ajax({
        type		: "GET",
        url		    : "/1_dms/public/userinfo/" + $(this).data('id'),
        success		: function(html) {					
                        $("#user_info").html(html).show('slow');
                        $('#userinfo_edit').removeAttr("disabled");
                    },
                    error : function (jqXHR, textStatus, errorThrown) {							
                            window.location.href = '/1_dms/public/login';
                    } //end function
    });//close ajax
});

$(document).on('click', '.users_delete_btn', function(e) {
    /* alert($(this).data('id'));   */
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
           $('#users_delete_form'+$(this).data('id')).trigger('submit');
        }
      })
});

$(document).on('click', '#cpassword_btn', function(e) {
    /* alert('test'); */
    $(this).hide();
    $('#cpassword').show();
});

$(document).on('click', '#cpasswordCancel_btn', function(e) {
    /* alert('test'); */
    $('#cpassword_btn').show();
    $('#cpassword').hide();
});