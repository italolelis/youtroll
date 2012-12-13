<h2 class="page-title align-center"><?= HApp::t('slogan') ?></h2>

<div class="alignCenter">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
            'id' => 'searchForm',
            'enableAjaxValidation' => false,
            'enableClientValidation' => false,
            'clientOptions' => array(
                'validateOnSubmit' => false,
                'validateOnType' => false,
                'validateOnChange' => false,
            ),
        ));
    ?>
    
    <div class="input-block">
        <?= $form->textField($model, 'search', array('placeHolder' => HApp::t('search') . '...')) ?>
        <?php
        echo CHtml::ajaxButton('', array('form/search'),
            HView::getAjaxSubmitButtonConfig(),
            array(
                'id' => 'searchButton',
                'class' => 'button large',
                'live' => false,
            )
        );
        ?>
    </div>
    
    <?php $this->endWidget(); ?>
</div>

<div class="marginTop">
    <?= $this->renderPartial('utils/publicationsList', array('title' => 'recentPublications', 'publications' => $recentPublications)) ?>
    <?= $this->renderPartial('utils/publicationsList', array('title' => 'popularPublications', 'publications' => $popularPublications)) ?>
    <?= $this->renderPartial('utils/publicationsList', array('title' => 'mostViewedPublications', 'publications' => $mostViewedPublications)) ?>
    <?= $this->renderPartial('utils/publicationsList', array('title' => 'lessViewedPublications', 'publications' => $lessViewedPublications)) ?>
</div>