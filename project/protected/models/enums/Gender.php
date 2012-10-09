<?php

class Gender
{

    CONST MALE = 1;
    CONST FEMALE = 2;

    public static function getGenders()
    {
        return array(
            self::MALE => 'MALE',
            self::FEMALE => 'FEMALE',
        );
    }

    public static function parse($type)
    {
        if (self::MALE === $type) {
            return HApp::t('male');
        } elseif (self::FEMALE === $type) {
            return HApp::t('female');
        }
    }

}
