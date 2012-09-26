<?php

class Status
{

    const ACTIVE = 1;
    const BLOCKED = 2;
    const INACTIVE = 3;

    public static function getStatus()
    {
        return array(
            self::ACTIVE => "ACTIVE",
            self::BLOCKED => "BLOCKED",
            self::INACTIVE => "INACTIVE",
        );
    }

}
