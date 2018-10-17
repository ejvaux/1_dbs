$('#app').on('submit','.form_to_submit',function(){
    $('.form_submit_button').prop('disabled', true);
    $('.form_submit_button').html('PROCESSING...');
});