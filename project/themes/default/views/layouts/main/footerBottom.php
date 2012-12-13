<div class="container">
    <ul>
        <li><?= HApp::t('powered') ?></li>
    </ul>
    <?php
    $this->widget('zii.widgets.CMenu', array(
        'id' => 'footerBottomMenu',
        'items' => array(                
            array(
                'label' => HApp::t('terms'),
                'url' => Yii::app()->createAbsoluteUrl('terms'),
                'itemOptions' => array('id' => 'termsFooterNav'),
                'linkOptions' => HView::getAjaxRenderConfig('ajax', 'loadView', array('view' => 'terms'), 'terms'),
            ),
            array(
                'label' => HApp::t('privacy'),
                'url' => Yii::app()->createAbsoluteUrl('privacy'),
                'itemOptions' => array('id' => 'privacyFooterNav'),
                'linkOptions' => HView::getAjaxRenderConfig('ajax', 'loadView', array('view' => 'privacy'), 'privacy'),
            ),
        ),
        'htmlOptions' => array('class' => 'floatRight'),
    ));
    ?>
</div>