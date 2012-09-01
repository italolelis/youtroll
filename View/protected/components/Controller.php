<?php

class Controller extends CController {

	public function init() {
		// Alterar
		
		Yii::app()->name = Yii::t('app', 'name');
	}

}