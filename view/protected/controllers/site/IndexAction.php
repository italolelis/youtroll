<?php

class IndexAction extends CAction
{

    public function run()
    {
        $this->controller->render('index');
    }

}