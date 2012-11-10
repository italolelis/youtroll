<!DOCTYPE html>
<html lang="<?= Yii::app()->getLanguage() ?>">
    <head>
	<?= $this->renderPartial('webroot.themes.' . Yii::app()->theme->name . '.views.layouts.' . Yii::app()->layout . '.head') ?>
    </head>
    <body cz-shortcut-listen="true">
        <div id="container">
	    <div id="body" class="center">
		<header id="header" class="clearfix">
                    <div class="container">
                        <?= $this->renderPartial('webroot.themes.' . Yii::app()->theme->name . '.views.layouts.' . Yii::app()->layout . '.header') ?>
                    </div>
		</header>
		<div id="content" class="container clearfix">
                    <?= $this->renderPartial('webroot.themes.' . Yii::app()->theme->name . '.views.layouts.' . Yii::app()->layout . '.view', array('content' => $content)) ?>
		</div>
		<div id="footer" class="clearfix">
		    <?= $this->renderPartial('webroot.themes.' . Yii::app()->theme->name . '.views.layouts.' . Yii::app()->layout . '.footer') ?>
		</div>
                <div id="footer-bottom" class="clearfix">
		    <?= $this->renderPartial('webroot.themes.' . Yii::app()->theme->name . '.views.layouts.' . Yii::app()->layout . '.footerBottom') ?>
		</div>
	    </div>
	</div>
        <?= CHtml::link(HApp::t('top'), '#', array('id' => 'back-to-top', 'class' => 'displayInline')) ?>
    </body>
</html>

<?= $this->renderPartial('webroot.themes.' . Yii::app()->theme->name . '.views.layouts.' . Yii::app()->layout . '.head.scripts') ?>