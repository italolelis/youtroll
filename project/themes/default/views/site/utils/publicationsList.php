<?php
$this->widget('ext.JCarousel.JCarousel', array(
    'dataProvider' => new CArrayDataProvider($publications),
    
    'thumbUrl' => 'str_replace(".", "_thumb.", Yii::app()->baseUrl . "/resources/img/user/{$data->owner}/{$data->image_path}")',
    'imageUrl' => 'Yii::app()->baseUrl . "/resources/img/user/{$data->owner}/{$data->image_path}"',
    'target' => '#',
    
    'summaryText' => '<h6 class="section-title">'.HApp::t($title).'</h6>',
    'titleText' => '$data->title',
    'altText' => '$data->title',
    'categories' => 'Category::getNameByID($data->category)',
    
    'cssFile' => false,
    'skin' => 'yt',
    
    'clickCallback' => '',
));
?>