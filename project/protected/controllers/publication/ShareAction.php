<?php

class ShareAction extends CAction
{

    public function run()
    {
	if (Yii::app()->request->isPostRequest && Yii::app()->request->isAjaxRequest) {
            HApp::ajaxResponse(array(
                'action' => 'showDiv',
                'div' => 'imageShare',
            ));
	}

	HApp::throwException(400);
    }

}