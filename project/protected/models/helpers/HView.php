<?php

class HView
{
    
    /**
     * Esta função retorna a configuração para o evendo AJAX de clique nos links do site.
     */
    public static function getAjaxRenderConfig($controller = '', $view = '', $params = 'undefined', $showUrl = 'undefined', $additionalOptions = array())
    {
        return array_merge($additionalOptions, array(
                'onClick' => "renderView('" . $controller . "', '" . $view . "', " . CJSON::encode($params) . ", '" . $showUrl . "', '" . HApp::t('loading') . "'); return false;"
        ));
    }
    
    /**
     * Esta função retorna um array para configurar o AJAX dos Botões de Formulário
     */
    public static function getAjaxSubmitButtonConfig($params = null)
    {
        $return = array(
            'type' => 'POST',
            'dataType' => 'json',
            'async' => true,
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
                        case 'inputFocus':
                            $('#' + response.input).focus();
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