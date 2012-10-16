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
            self::ADULT => Category::getName('adult'),
            self::ANIMATION => Category::getName('animation'),
            self::ASSEMBLY => Category::getName('assembly'),
            self::MEME => Category::getName('meme'),
            self::STRIP => Category::getName('strip'),
        );
    }

    public static function getName($key)
    {
        return HApp::t($key, 'categories');
    }

}
