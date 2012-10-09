<?php

class HView
{

    private static function _getData($view, $controller = null)
    {
	$data = array('name' => $view);

	if (!empty($controller)) {
	    $data['controller'] = $controller;
	}

	return $data;
    }

    /**
     * Esta função retorna um array para configurar o AJAX do Menu
     */
    public static function getAjaxMenuArrayConfig($view, $controller = null)
    {
	return array(
	    'url' => array('ajax/loadView'),
	    'type' => 'POST',
	    'dataType' => 'html',
	    'data' => HView::_getData($view, $controller),
            'async' => false,
	    'cache' => false,
	    'beforeSend' => "function() {
		if($('#{$view}Nav').hasClass('current')) { return false; }
		
		$('#menu').children('li.current').removeClass('current');
		$('#{$view}Nav').addClass('current');
                $('#messages').empty();

		showLoading('" . HApp::t('loading') . "');
	    }",
	    'success' => "function(response) {
                setTimeout(function() {
		    removeLoading(function() {
			$('#view').html(response).fadeIn(125);
		    });
		}, 250);
	    }",
	    'error' => "function(error, b, c, d, e) {
		setTimeout(function() {
		    removeLoading(function() {
			setAlertMessage(error.responseText, 'error', 'messages', true);
		    });
		}, 250);
	    }",
	);
    }
    
    /**
     * Esta função retorna um array para configurar o AJAX dos Botões de Formulário
     */
    public static function getAjaxSubmitButtonConfig()
    {
        return array(
            'type' => 'POST',
            'dataType' => 'json',
            'async' => false,
            'cache' => false,
            'beforeSend' => "function() {
                clearErrorsMesages();
            }",
            'success' => "function(response) {
                if(response.return) {
                    if(response.clickMenu !== undefined) {
                        $('#' + response.clickMenu).children('a').click();
                    } else if(response.view !== undefined) {
                        $('#view').html(response.view);
                    } else {
                        location.reload();
                    }
                    
                    if((response.message.type !== undefined) && (response.message.text !== undefined)) {
                        setAlertMessage(response.message.text, response.message.type, 'messages', true);
                    }
                } else {
                    showAjaxValidationMessages(response);
                }
            }",
            'error' => "function(error) {
                setAlertMessage(error.responseText, 'error', 'messages');
            }",
        );
    }
}