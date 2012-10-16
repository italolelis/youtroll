<?php

class SendImageForm extends CFormModel
{

    public $title;
    public $description;
    public $image;
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
	    array('title, description, category, tags', 'required', 'message' => Yii::t('app', 'Este campo é obrigatório.')),
	    array('title', 'length', 'min' => 3, 'max' => 100, 'tooShort' => Yii::t('app', 'Este campo deve ter no mínimo {min} caracteres.'), 'tooLong' => Yii::t('app', 'Este campo deve ter no máximo {max} caracteres.')),
	    array('description', 'length', 'max' => 256, 'tooShort' => Yii::t('app', 'Este campo deve ter no mínimo {min} caracteres.'), 'tooLong' => Yii::t('app', 'Este campo deve ter no máximo {max} caracteres.')),
	    array('category', 'in', 'range' => array_keys(Category::getCategories()), 'allowEmpty' => false, 'message' => Yii::t('app', 'A opção selecionada não existe.')),
	    array('image', 'file', 'minSize' => $this->minSizeAnnex, 'allowEmpty' => true,
		'types' => $this->annexExtensions, 'wrongType' => Yii::t('app', 'O tipo do arquivo enviado não é suportado. Os tipos permitidos são: {types}.'),
		'maxFiles' => $this->maxAttachments, 'tooMany' => Yii::t('app', 'Você pode enviar no máximo {maxFiles} arquivo(s).'),
		'maxSize' => $this->maxSizeAnnex, 'tooLarge' => Yii::t('app', 'O arquivo deve ter no máximo: {maxSizeFile}.', array('{maxSizeFile}' => HConvert::byte($this->maxSizeAnnex))),
	    ),
	);
    }

    public function attributeLabels()
    {
	return array(
	    'title' => HApp::t('title'),
	    'description' => HApp::t('description'),
	    'image' => HApp::t('image'),
	    'category' => HApp::t('category'),
	    'tags' => HApp::t('tags'),
	);
    }

}