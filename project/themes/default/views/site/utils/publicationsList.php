<div class="infobox">
<?php
$this->widget('ext.JCarousel.JCarousel', array(
    'dataProvider' => new CArrayDataProvider($publications),
    
    'thumbUrl' => 'HView::getImageUrl($data->owner, $data->image_path, true)',
    'imageUrl' => 'Yii::app()->createAbsoluteUrl("", array("view" => HSecurity::urlEncode("{$data->id}")))',
    'target' => '#',
    
    'summaryText' => '<h6 class="section-title">' . HApp::t($title) . '</h6>',
    'titleText' => '$data->title',
    'altText' => '$data->title',
    'categories' => 'Category::getNameByID($data->category)',
    
    'cssFile' => false,
    'skin' => 'yt',
    'enablePagination' => false,
    
    'clickCallback' => '',
));
?>
</div>