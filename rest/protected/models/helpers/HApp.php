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
     * Esta função retorna uma mensagem de erro baseando-se no status do mesmo.
     */
    public static function getMessageStatus($status)
    {
	return HApp::t($status) ?: HApp::t(500);
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
	    case 'PARAM':
		return Yii::app()->request->getParam($index);
	    default:
		HApp::throwException(500);
	}
    }

    /**
     * Esta função retorna os dados para requisições AJAX feitas na aplicação.
     */
    public static function ajaxResponse($response, $replace = false)
    {
	if (isSet($response)) {
	    if (is_array($response)) {
		$return = CJSON::encode($response);
	    } else {
		$return = Yii::app()->request->isAjaxRequest ? $response : utf8_decode($response);
	    }

            echo $replace ? str_replace('fk_', '', str_replace($replace, '', $return)) : $return;
            
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

    /**
     * Substituí a função apache_request_headers se a mesma não existir.
     */
    public static function getHeaders() {
        if(function_exists('apache_request_headers')) {
            return apache_request_headers();
        } else {
            $response = array();
            $response['Authorization'] = 'Basic ' . base64_encode($_SERVER['PHP_AUTH_USER'] . ':' . $_SERVER['PHP_AUTH_PW']);
            
            foreach($_SERVER as $key => $value) {
                if (substr($key, 0, 5) == 'HTTP_') {
                    $key = str_replace(" ", "-", ucwords(strtolower(str_replace("_", " ", substr($key,5)))));
                    $response[$key] = $value;
                } 
            } 
            return $response;
        }
    }
    
}