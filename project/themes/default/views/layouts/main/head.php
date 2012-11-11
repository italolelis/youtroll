<?= CHtml::metaTag('text/html; charset=UTF-8', null, 'Content-Type') ?>
<?= CHtml::metaTag('author', 'author') ?>
<?= CHtml::metaTag(Yii::app()->params['adminEmail'], 'reply-to') ?>
<?= CHtml::metaTag(HApp::t('description'), 'description') ?>
<?= CHtml::metaTag(HApp::t('keywords'), 'keywords') ?>
<?= CHtml::metaTag('NetBeans IDE 7.0.1', 'generator') ?>
<?= CHtml::metaTag('index, follow', 'robots') ?>
<?= CHtml::metaTag('index, follow', 'googlebot') ?>

<?php Yii::app()->clientScript->registerLinkTag('shortcut icon', 'image/png', Yii::app()->baseUrl . '/resources/img/favicon.png'); ?>

<title><?= HApp::t('name') ?></title>

<?= $this->renderPartial('webroot.themes.' . Yii::app()->theme->name . '.views.layouts.' . Yii::app()->layout . '.head.styles') ?>