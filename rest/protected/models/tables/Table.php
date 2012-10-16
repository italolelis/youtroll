<?php

class Table extends CActiveRecord
{

    protected $attributesPrefix;

    public function getAttributesPrefix()
    {
        return $this->attributesPrefix ? : '';
    }
    
    public function setAttributesWithoutPrefix($attributes)
    {   
        array_walk($attributes, array($this, 'setAttributeWithoutPrefix'));
    }

    public function getAttributeWithoutPrefix($name)
    {   
        return $this->getAttribute($this->getAttributesPrefix() . $name);
    }
    
    public function setAttributeWithoutPrefix($value, $name)
    {
        $this->setAttribute($this->getAttributesPrefix() . $name, $value);
    }

}