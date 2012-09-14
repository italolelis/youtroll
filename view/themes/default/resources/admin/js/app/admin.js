/**
* This function loads the basic configs when we're using ajax 
*/
function loadConfig(){
    $("#UserEditForm_birthday").mask("99/99/9999");
    $('#editUser').on('submit',function(){
        var urlAction = $(this).attr('action');
        $.ajax(
        {
            url:urlAction,
            type:'POST',
            cache:false,
            dataType:'json',
            data:$(this).serialize(),
            success:function(response) {
                if(typeof response.redirect != 'undefined' ) {
                    window.location = response.redirect;
                }
            //$("#content-modal-edit-user").modal().close();
            },
            complete:function(response) {
                $('#load-login').hide('slow');
            },
            error:function() {
                        
            }
                        
        });
        
        return false;     
    });
    $('#editCategory').on('submit',function(){
        var urlAction = $(this).attr('action');
        $.ajax(
        {
            url:urlAction,
            type:'POST',
            cache:false,
            dataType:'json',
            data:$(this).serialize(),
            success:function(response) {
                if(typeof response.redirect != 'undefined' ) {
                    window.location = response.redirect;
                }
            //$("#content-modal-edit-user").modal().close();
            },
            complete:function(response) {
                $('#load-login').hide('slow');
            },
            error:function() {
                        
            }
                        
        });
        
        return false;     
    });
}