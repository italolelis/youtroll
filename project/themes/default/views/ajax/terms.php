<h1 class="page-title"><?= HApp::t('termsTitle') ?></h1>

<div class="infobox alignJustify">
    <div><?= HApp::t('terms_1_1.1', 'texts') ?></div>
    <div><?= HApp::t('terms_1_1.2', 'texts') ?></div>
    
    <h5 class="section-title marginTop"><?= HApp::t('terms_1_2', 'texts') ?></h5>
    <div class="marginTop"><?= HApp::t('terms_1_2.1', 'texts') ?></div>
    <div class="marginTop"><?= HApp::t('terms_1_2.2', 'texts') ?></div>
    
    <h5 class="section-title marginTop"><?= HApp::t('terms_1_3', 'texts') ?></h5>
    <div class="marginTop">
        <?php
        echo Yii::t('texts', 'terms_1_3.1', array(
            '{privacy}' => CHtml::link(HApp::t('privacyTitle'), array('site/privacy'), array(
                'id' => 'privacyLink',
                'ajax' => HView::getAjaxMenuArrayConfig('privacy')
            ))
        ));
        ?>
    </div>
    
    <h5 class="section-title marginTop"><?= HApp::t('terms_1_4', 'texts') ?></h5>
    <div class="marginTop"><?= HApp::t('terms_1_4.1', 'texts') ?></div>
    
    <h5 class="section-title marginTop"><?= HApp::t('terms_1_5', 'texts') ?></h5>
    <div class="marginTop"><?= HApp::t('terms_1_5.1', 'texts') ?></div>
    
    <h5 class="section-title marginTop"><?= HApp::t('terms_1_6', 'texts') ?></h5>
    <div class="marginTop"><?= HApp::t('terms_1_6.1', 'texts') ?></div>
    
    <h5 class="section-title marginTop"><?= HApp::t('terms_1_7', 'texts') ?></h5>
    <div class="marginTop"><?= HApp::t('terms_1_7.1', 'texts') ?></div>
    
    <h5 class="section-title marginTop"><?= HApp::t('terms_1_8', 'texts') ?></h5>
    <div class="marginTop"><?= HApp::t('terms_1_8.1', 'texts') ?></div>
    
    <ul class="arrow-2 dotted marginTop">
        <li><?= HApp::t('terms_revision', 'texts') ?></li>
    </ul>
</div>