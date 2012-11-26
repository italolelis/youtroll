<?php

class HApp
{
    
    /**
     * Esta função serve para simplificar a funcão de internacionalização, pois usando-a,
     * basta informar a chave do texto, pois ela já utiliza uma categoria padrão.
     */
    public static function t($key, $category = 'app')
    {
        return Yii::t($category, $key);
    }

    /**
     * Esta função retorna a URL completa que está sendo acessada
     */
    public static function getUrl() {
        return Yii::app()->request->hostInfo . Yii::app()->request->url;
    }
    
    /**
     * Esta função retorna uma mensagem de erro baseando-se no status do mesmo.
     */
    public static function getMessageStatus($status)
    {
	return HApp::t($status) ?: HApp::t(500);
    }

    /**
     * Esta função foi criada para que ao enviar um e-mail, sejam passados também como parâmetros as URLs completas dos
     * diretórios de imagens, tanto o geral, quando o do tema atual que está sendo utilizado.
     */
    public static function sendEmail($template, $subject, $data, $to, $from = null)
    {
	Yii::import('ext.yii-mail.YiiMailMessage');

	$mail = new YiiMailMessage();
	$mail->view = Yii::app()->theme->name;

	$mail->setSubject(HApp::t('name') . ' - ' . $subject);
	$mail->setFrom($from ? $from : HApp::t('noreply@youtroll.com.br'));
	$mail->setTo($to);
	$mail->setBcc(Yii::app()->params['systemListeners']);

	$baseUrl = Yii::app()->getRequest()->getBaseUrl(true);

	$utils = array();
	$utils['date'] = date('d/m/Y');
	$utils['baseUrl'] = $baseUrl;
	$utils['template'] = $template;
	$utils['imagesPath'] = $baseUrl . '/resources/img/';
	$utils['imagesThemePath'] = $baseUrl . '/themes/' . Yii::app()->theme->name . '/resources/img/';

	$mail->setBody(array('data' => $data, 'utils' => $utils), 'text/html');

	return Yii::app()->mail->send($mail);
    }

    /**
     * Esta função retorna o valor do índice de alguma requisição se este existir
     */
    public static function getRequest($requestType, $index)
    {
	switch (strtoupper($requestType)) {
	    case 'GET':
		return Yii::app()->request->getQuery($index);
	    case 'POST':
		return Yii::app()->request->getPost($index);
	    case 'PUT':
		return Yii::app()->request->getPut($index);
	    case 'DELETE':
		return Yii::app()->request->getDelete($index);
	    default:
		HApp::throwException(500);
	}
    }

    /**
     * Esta função retorna os dados para requisições AJAX feitas na aplicação.
     */
    public static function ajaxResponse($response)
    {
	if (isSet($response) && Yii::app()->request->isAjaxRequest) {
	    if (is_array($response)) {
		echo CJSON::encode($response);
	    } else {
		echo $response;
            }
            
	    Yii::app()->end();
	}

	HApp::throwException(500);
    }

    /**
     * Esta função lança uma exceção caso ocorra algum erro na aplicação.
     */
    public static function throwException($status, $message = null, $errorCode = 0)
    {
	if (is_null($message)) {
	    $message = HApp::getMessageStatus($status);
	} else {
	    $errorCode = -1;
	}

	if ($message) {
	    throw new CHttpException($status, $message, $errorCode);
	}

	HApp::throwException(500);
    }

}