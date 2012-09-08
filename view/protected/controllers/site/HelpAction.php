<?php

class HelpAction extends CAction
{

    public function run()
    {
        $this->controller->render('help');
    }

}