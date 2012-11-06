<?php

class Table extends CActiveRecord
{

    protected $attributesPrefix;

    public function getAttributesPrefix()
    {
        return $this->attributesPrefix ? : '';
    }
    
    public function getOutPrefix($name)
    {   
        return $this->getAttribute($this->getAttributesPrefix() . $name);
    }
    
    public function setAttributesWithoutPrefix($attributes)
    {   
        array_walk($attributes, array($this, 'setOutPrefix'));
    }
    
    public function setOutPrefix($value, $name)
    {
        $this->setAttribute($this->getAttributesPrefix() . $name, $value);
        $this->setAttribute($this->getAttributesPrefix() . 'fk_' . $name, $value);
    }
    
    public function limit($limit)
    {
        $this->getDbCriteria()->mergeWith(array(
            'limit' => $limit,
        ));
        
        return $this;
    }

}