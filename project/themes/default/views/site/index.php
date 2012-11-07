<h2 class="page-title align-center"><?= HApp::t('slogan') ?></h2>

<h6 class="section-title"><?= HApp::t('recentPublications') ?></h6>

<?php
$this->widget('ext.JCarousel.JCarousel', array(
    'dataProvider' => new CArrayDataProvider($recentPublications),
    'thumbUrl' => 'str_replace(".", "_thumb.", Yii::app()->baseUrl . "/resources/img/user/{$data->owner}/{$data->image_path}")',
    'imageUrl' => 'Yii::app()->baseUrl . "/resources/img/user/{$data->owner}/{$data->image_path}"',
    'altText' => '$data->title',
    'titleText' => '$data->title',
    'categories' => 'Category::getNameByID($data->category)',
    'skin' => 'yt',
    'clickCallback' => '',
    'target' => '#',
));
?>