$(function(){
    $('.form-user-edit').on('submit',function(){
        
        var urlAction = $(".form-user-edit").attr('action');
        var redirect = 'view';
        
        
        console.log(urlAction);
        return false;
        
        setTimeout(function() {    
            $.ajax(
                {
                    url:urlAction,
                    type:'POST',
                    cache:false,
                    dataType:'json',
                    data:$(".form-user-edit").serialize(),
                    beforeSend:function() {
                    },
                    success:function(response) {
                        if(typeof response.redirect != 'undefined' ) {
                            window.location = response.redirect;
                        }
                    },
                    complete:function(response) {
                        $('#load-login').hide('slow');

                    },
                    error:function() {
                        
                    }
                        
                });
        }, 3000);
        
           return false;     
    })
    return false;
})

