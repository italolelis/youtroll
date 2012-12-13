<?php

class SearchForm extends CFormModel
{

    public $search;

    public function rules()
    {
	return array(
	    array('search', 'required', 'message' => HApp::t('requiredField')),
	);
    }

    public function attributeLabels()
    {
	return array(
	    'seacrh' => HApp::t('search'),
	);
    }

}