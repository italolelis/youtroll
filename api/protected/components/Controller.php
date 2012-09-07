<?php

class Controller extends CController
{

    public function init()
    {
        // Alterar

        Yii::app()->name = Yii::t('app', 'name');
        Yii::app()->language = 'pt_br'; // Alterar
    }

}