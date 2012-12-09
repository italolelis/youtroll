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

    public static function getKeyName()
    {
        return array(
            self::ANIMATION => 'animation',
            self::ASSEMBLY => 'assembly',
            self::BLACK_HUMOR => 'blackHumor',
            self::DOUBLE_ENTENDRE => 'doubleEntendre',
            self::JOKE => 'joke',
            self::MEME => 'meme',
            self::MINDFUCK => 'mindfuck',
            self::STRIP => 'strip',
        );
    }
    
    public static function getKeyNameByID($key)
    {
        $hashes = Category::getKeyName();
        
        return $hashes[$key] ?: '';
    }
    
    public static function getIDByKeyName($keyName)
    {
        $hashes = Category::getKeyName();
        
        return array_search($keyName, $hashes);
    }
    
    public static function getNames()
    {
        return array(
            self::ANIMATION => Category::getName(Category::getKeyNameByID(self::ANIMATION)),
            self::ASSEMBLY => Category::getName(Category::getKeyNameByID(self::ASSEMBLY)),
            self::BLACK_HUMOR => Category::getName(Category::getKeyNameByID(self::BLACK_HUMOR)),
            self::DOUBLE_ENTENDRE => Category::getName(Category::getKeyNameByID(self::DOUBLE_ENTENDRE)),
            self::JOKE => Category::getName(Category::getKeyNameByID(self::JOKE)),
            self::MEME => Category::getName(Category::getKeyNameByID(self::MEME)),
            self::MINDFUCK => Category::getName(Category::getKeyNameByID(self::MINDFUCK)),
            self::STRIP => Category::getName(Category::getKeyNameByID(self::STRIP)),
        );
    }
    
    public static function getNameByID($key)
    {
        $names = Category::getNames();
        
        return $names[$key] ?: '';
    }

}
