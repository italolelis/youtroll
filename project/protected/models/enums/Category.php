<?php

class Category
{

    CONST ADULT = 1;
    CONST ANIMATION = 2;
    CONST ASSEMBLY = 3;
    CONST MEME = 4;
    CONST STRIP = 5;

    public static function getCategories()
    {
        return array(
            self::ADULT => $this->getName('adult'),
            self::ANIMATION => $this->getName('animation'),
            self::ASSEMBLY => $this->getName('assembly'),
            self::MEME => $this->getName('meme'),
            self::STRIP => $this->getName('strip'),
        );
    }

    public static function getName($key)
    {
        return HApp::t($key, 'categories');
    }

}
