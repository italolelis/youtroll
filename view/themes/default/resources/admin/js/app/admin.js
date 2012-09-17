/**
* This function loads the basic configs when we're using ajax 
*/
function loadConfig(){
    $("#UserEditForm_birthday").mask("99/99/9999");
}

$('#editUser').live('submit',function(){
    var urlAction = $(this).attr('action');
    Ajax.post(urlAction, null, $(this).serialize());
    return false;
});
    
$('#editCategory').live('submit',function(){
    var urlAction = $(this).attr('action');
    Ajax.post(urlAction, null, $(this).serialize());
    return false;     
});
    
Ajax = {
    create: function(url, success, type, data){
        
        $.ajax(
        {
            url: url,
            type: type,
            cache: false,
            dataType: 'json',
            data: data,
            success: function(response) {
                if(typeof response.redirect != 'undefined' ) {
                    window.location = response.redirect;
                }
                $('#load-login').hide('slow');
            },
            complete: success,
            error: this.error
        });
    },
    get: function (url, success, data){
        return this.create(url, success, "GET", data);
    },
    post: function (url, success, data){
        return this.create(url, success, "POST", data);
    },
    remove: function (url, success, data){
        return this.create(url, success, "DELETE", data);
    },
    error: function(jqXHR, textStatus, errorThrown){
        
    }
}