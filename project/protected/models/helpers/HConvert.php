<?php

class HConvert
{

    /**
     * Esta função converte um valor passado em bytes.
     * 
     * A função foi retirada e alteradada site http://www.lucaspeperaio.com.br/blog/funcao-php-para-converter-bytes-em-kilobytes-megabytes-gigabytes
     */
    public static function byte($size)
    {
	if (is_int($size)) {
	    $sizeNames = array(' byte(s)', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');

	    return $size ? round($size / pow(1024, ($index = floor(log($size, 1024)))), 2) . $sizeNames[$index] : '0 bytes';
	}

	HApp::throwException(500);
    }
    
    /**
     * Esta função converte um array para um objeto.
     */
    public static function arrayToObject($array)
    {
        return CJSON::decode(CJSON::encode($array), false);
    }
    
}