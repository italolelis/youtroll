function clearErrorsMesages() {
    $('#messages').empty();
    $("[class*='errorMessage']").empty();
}

function setAlertMessage(text, type, idDiv, fadeOutOff) {
    $('div#' + idDiv).fadeOut(typeof fadeOutOff === 'undefined' ? 750 : 0, function() {
	$(this).html("<p class='alert-" + type + "'>" + text + "</p>").fadeIn(750);
    });
}

function showAjaxValidationMessages(response) {
    for (idInput in response) {
	while(response[idInput]) {
            $('#' + idInput).parent().append("<div class='errorMessage'>" + response[idInput][0] + "</div>");
	    break;
	}
    }
}

function renderView(controller, view, params, showUrl, loadingMessage) {
    route = controller + '/' + view;
    ajaxUrl = url + (route === '/' ? '' : route);
    
    $.ajax({
        url: ajaxUrl,
        type: 'POST',
        dataType: 'html',
        data: params,
        async: false,
        cache: false,
        beforeSend: function() {
//            if($('#{$view}Nav').hasClass('current')) { return false; }
		
            showLoading(loadingMessage);

            $('#menu').children('li.current').removeClass('current');
            $('#menu').children('li').children('ul').children('li').removeClass('current');
            $('#' + view + 'Nav').addClass('current');
            $('#' + view + 'Nav').parent().parent().addClass('current');
            $('#messages').empty();
        },
        success: function(response) {
            setTimeout(function() {
                removeLoading(function() {
                    $('#view').html(response).fadeIn(125);
                    window.history.pushState('Object', 'Title', showUrl === undefined ? ajaxUrl  : url + showUrl);
                });
            }, 250);
        },
        error: function(error, b, c, d, e) {
            setTimeout(function() {
                removeLoading(function() {
                    setAlertMessage(error.responseText, 'error', 'messages', true);
                });
            }, 250);
        }
    });
}