<?php

if (!defined('DS')) define('DS', DIRECTORY_SEPARATOR);

class MeioMask extends CWidget {
  
  protected $clientScript;
  
  public $selector = null;
  public $options = null;
  
  public function init() {
    $this->clientScript = Yii::app()->clientScript;
  }

  private function registerScripts() {
    $this->clientScript->registerCoreScript('jquery');
    $publishUrlBase = Yii::app()->assetManager->publish(dirname(__FILE__).DS.'assets');
    $this->clientScript->registerScriptFile($publishUrlBase.'/jquery.meio.mask.min.js');
  }

  private function registerStartScript() {
    if (is_null($this->selector)) 
      $this->selector = 'input:text';
    
    if (is_array($this->selector))
      $selector = implode(',',$this->selector);
    else
      $selector = $this->selector;
      
    $js = str_replace('\"', "'", '$("'.$selector.'").setMask('. CJSON::encode($this->options) .');');
    $matches = array();
    $ct = preg_match_all('/"[Jj][Ss] ?: ?([^"]*)"/' , $js, $matches);
    for ($i = 0; $i <= $ct; $i++)
      $js = str_replace($matches[0][$i], $matches[1][$i], $js);
    
    $scriptId = ereg_replace('[^[:alnum:]]+', '', __CLASS__.'.'.$selector);
    $this->clientScript->registerScript($scriptId, $js);
  }

  public function run() {
    $this->registerScripts();
    $this->registerStartScript();
  }
}
