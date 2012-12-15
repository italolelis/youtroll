<?= Chtml::link(CHtml::image(Yii::app()->baseUrl . '/resources/img/logo.png', HApp::t('name')), array('site/index'), HView::getAjaxRenderConfig('', '', 'undefined', 'undefined', array('id' => 'logo'))) ?>

<?= $this->renderPartial('webroot.themes.' . Yii::app()->theme->name . '.views.layouts.' . Yii::app()->layout . '.menu') ?>