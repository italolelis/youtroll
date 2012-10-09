<?= Chtml::link(CHtml::image(Yii::app()->baseUrl . '/resources/img/logo.png', HApp::t('name')), array('#'), array('id' => 'logo', 'ajax' => HView::getAjaxMenuArrayConfig('index', 'site'))) ?>

<?= $this->renderPartial('webroot.themes.' . Yii::app()->theme->name . '.views.layouts.' . Yii::app()->layout . '.menu') ?>