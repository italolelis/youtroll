function clearErrorsMesages() {
    $('#messages').empty();
    $("[class*='errorMessage']").remove();
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