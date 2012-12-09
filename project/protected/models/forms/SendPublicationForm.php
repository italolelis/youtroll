<?php

class SendPublicationForm extends CFormModel
{

    public $title;
    public $description;
    public $image;
    public $image_path;
    public $category;
    public $tags;
    
    public $annexExtensions;
    public $maxAttachments = 1;
    public $minSizeAnnex = 0;
    public $maxSizeAnnex;

    public function init()
    {
	$this->maxSizeAnnex = Yii::app()->params['maxSizeUpload'];
	$this->annexExtensions = implode(', ', Yii::app()->params['allowedExtensions']);
    }

    public function rules()
    {
	return array(
	    array('title, description, category, tags, image_path', 'required', 'message' => HApp::t('requiredField')),
            array('tags', 'match', 'pattern' => '/^[ ,]*(?:[a-zA-Z0-9]+(?:[ ,]+[a-zA-Z0-9]+){0,5})?[ ,]*$/', 'message' => HApp::t('invalidTags')),
	    array('title', 'length', 'min' => 3, 'max' => 100, 'tooShort' => HApp::t('tooShort'), 'tooLong' => HApp::t('tooLong')),
	    array('description', 'length', 'max' => 256, 'tooShort' => HApp::t('tooShort'), 'tooLong' => HApp::t('tooLong')),
	    array('category', 'in', 'range' => array_keys(Category::getNames()), 'allowEmpty' => false, 'message' => HApp::t('invalidOption')),
	    array('image', 'file', 'minSize' => $this->minSizeAnnex, 'allowEmpty' => true,
		'types' => $this->annexExtensions, 'wrongType' => HApp::t('wrongType'),
		'maxFiles' => $this->maxAttachments, 'tooMany' => HApp::t('tooMany'),
		'maxSize' => $this->maxSizeAnnex, 'tooLarge' => Yii::t('app', 'tooLarge', array('{maxSizeFile}' => HConvert::byte($this->maxSizeAnnex))),
	    ),
	);
    }

    public function attributeLabels()
    {
	return array(
	    'title' => HApp::t('title'),
	    'description' => HApp::t('description'),
	    'image' => HApp::t('image'),
	    'image_path' => HApp::t('image'),
	    'category' => HApp::t('category'),
	    'tags' => HApp::t('tags'),
	);
    }
    
    public function getAttributeListErrors()
    {
	return 'image_path';
    }

}