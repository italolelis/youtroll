$(function(){
    function submitAjaxForm(form, data, hasError) {    
		    
               if(!hasError) {
			$.ajax(
			{
			    url:'',
			    type:'POST',
			    cache:false,
			    dataType:'html',
			    data:$(form).serialize(),
			    beforeSend:function() {
				$('#load-login').show('fast');
			    },
			    complete:function(response) {
				$('#load-login').hide('slow');
			    },
			    error:function() {
				
			    }
			});
		    }
		}
})

