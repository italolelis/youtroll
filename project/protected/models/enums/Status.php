<?php

class Status
{
    CONST INACTIVE = 0;
    CONST ACTIVE = 1;
    CONST BLOCKED = 3;

    public static function getStatus()
    {
        return array(
            self::INACTIVE => "INACTIVE",
            self::ACTIVE => "ACTIVE",
            self::BLOCKED => "BLOCKED",
        );
    }

}
