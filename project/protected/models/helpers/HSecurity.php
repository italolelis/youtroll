<?php

class HSecurity
{

    /**
     * Esta função transforma um ID em uma string para ser inserida na URL do site.
     */
    public static function urlEncode($value)
    {
        return strtr(base64_encode($value), '+/=', '-%_');
    }

    /**
     * Esta função transforma um ID em uma string para ser inserida na URL do site.
     */
    public static function urlDecode($value)
    {
        return strtr(base64_encode($value), '+/=', '-%_');
    }

}