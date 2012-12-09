<?php

class HView
{

    private static function _getData($view, $controller = null, $params = null)
    {
	$data = array('name' => $view);

	if (!empty($controller)) {
	    $data['controller'] = $controller;
	}
        
        if (!empty($params)) {
	    $data['params'] = $params;
	}
        
	return $data;
    }

    /**
     * Esta função retorna um array para configurar o AJAX do Menu
     */
    public static function getAjaxMenuArrayConfig($view, $controller = null, $params = null)
    {
	return array(
	    'url' => array('ajax/loadView'),
	    'type' => 'POST',
	    'dataType' => 'html',
	    'data' => HView::_getData($view, $controller, $params),
            'async' => false,
	    'cache' => false,
	    'beforeSend' => "function() {
//		if($('#{$view}Nav').hasClass('current')) { return false; }
		
                showLoading('" . HApp::t('loading') . "');

		$('#menu').children('li.current').removeClass('current');
		$('#menu').children('li').children('ul').children('li').removeClass('current');
		$('#{$view}Nav').addClass('current');
		$('#{$view}Nav').parent().parent().addClass('current');
                $('#messages').empty();
	    }",
	    'success' => "function(response) {
                setTimeout(function() {
		    removeLoading(function() {
			$('#view').html(response).fadeIn(125);
                        window.history.pushState('Object', 'Title', '".Yii::app()->createAbsoluteUrl("$controller/$view")."');
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
    public static function getAjaxSubmitButtonConfig($params = null)
    {
        $return = array(
            'type' => 'POST',
            'dataType' => 'json',
            'async' => false,
            'cache' => false,
            'beforeSend' => "function() {
                clearErrorsMesages();
            }",
            'success' => "function(response) {
                if(response.action !== undefined) {
                    switch(response.action) {
                        case 'openMenuOption':
                            $('#' + response.menuOption + 'Nav').children('a').click();
                            break;
                        case 'renderView':
                            showLoading('" . HApp::t('loading') . "');
                            $('#view').html(response.view);
                            break;
                        case 'redirect':
                            location = response.link;
                            break;
                        case 'showDiv':
                            $('#' + response.div).fadeIn('slow');
                            break;
                        case 'addClass':
                            $('#' + response.activeButton).addClass(response.class);
                            $('#' + response.inactiveButton).removeClass(response.class);
                            break;
                        case 'removeClass':
                            $('#' + response.activeButton).removeClass(response.class);
                            break;
                        case 'reload':
                            location.reload();
                            break;
                    }
                    
                    if(response.message !== undefined) {
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
        
        if(is_array($params)) {
            $return = array_merge(array('data' => $params), $return);
        }
        
        return $return;
    }
    
    public static function getRealImageUrl($owner, $path) {
        return Yii::app()->basePath . "/../resources/img/user/$owner/$path";
    }
    
    public static function getImageUrl($owner, $path, $thumb = false) {
        $path = $thumb ? str_replace(".", "_thumb.", $path) : $path;
        
        return Yii::app()->createAbsoluteUrl("show/$owner$path");
    }
    
}