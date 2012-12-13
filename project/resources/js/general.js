var url = window.location.href.substr(0, window.location.href.indexOf('project') + 7) + '/';

$.fn.reset = function () {
    $(this).each (function() {
	this.reset();
    });
}

function showLoading(text, idDiv) {
    $('div#' + (typeof idDiv !== 'undefined' ? idDiv : 'view')).fadeOut(250, function() {
	$(this).fadeIn(250).html("<div class='alignCenter'><i class='loader'></i><div>" + (typeof text !== 'undefined' ? text : '') + "</div></div>");
    });
}

function removeLoading(callback) {
    $('.loader').parent().fadeOut(250, function() {
	$(this).remove();
	
	if(typeof callback === 'function'){
	    callback.call(this);
	}
    })
}