$(function(){
    $('#verticalForm').on('submit',function(){
        
        var urlAction = $("#verticalForm").attr('action');
        var redirect = 'view';
        
        $('#load-login').show();
        
        setTimeout(function() {    
            $.ajax(
			{
			    url:urlAction,
			    type:'POST',
			    cache:false,
			    dataType:'json',
			    data:$("#verticalForm").serialize(),
			    beforeSend:function() {
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

