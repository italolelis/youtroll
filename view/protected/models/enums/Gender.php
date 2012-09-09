<?php

class Gender
{

    const MALE = 1;
    const FEMALE = 2;

    public static function getGenders()
    {
        return array(
            self::MALE => self::MALE,
            self::FEMALE => self::FEMALE,
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
