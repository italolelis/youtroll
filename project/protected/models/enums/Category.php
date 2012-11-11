<?php

class Category
{

    CONST ANIMATION = 1;
    CONST ASSEMBLY = 2;
    CONST BLACK_HUMOR = 3;
    CONST DOUBLE_ENTENDRE = 4;
    CONST JOKE = 5;
    CONST MEME = 6;
    CONST MINDFUCK = 7;
    CONST STRIP = 8;
    
    public static function getName($keyName) {
        return HApp::t($keyName, 'categories');
    }
    
    public static function getCategories()
    {
        return array(
            self::ANIMATION => Category::getName('animation'),
            self::ASSEMBLY => Category::getName('assembly'),
            self::BLACK_HUMOR => Category::getName('blackHumor'),
            self::DOUBLE_ENTENDRE => Category::getName('doubleEntendre'),
            self::JOKE => Category::getName('joke'),
            self::MEME => Category::getName('meme'),
            self::MINDFUCK => Category::getName('mindfuck'),
            self::STRIP => Category::getName('strip'),
        );
    }

    public static function getNameByID($key)
    {
        $categories = Category::getCategories();
        
        return $categories[$key] ?: '';
    }

}
