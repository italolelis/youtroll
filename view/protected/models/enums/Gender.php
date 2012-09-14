<?php

class Gender
{

    const MALE = 1;
    const FEMALE = 2;

    public static function getGenders()
    {
        return array(
            self::MALE => "MALE",
            self::FEMALE => "FEMALE",
        );
    }

    public static function parse($type)
    {
        if (self::MALE === $type) {
            return __("MALE");
        } elseif (self::FEMALE === $type) {
            return __("FEMALE");
        }
    }

}
