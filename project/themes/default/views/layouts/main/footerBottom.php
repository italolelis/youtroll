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
                    'linkOptions' => array('ajax' => HView::getAjaxMenuArrayConfig('loadView', 'ajax', array('view' => 'terms'), 'terms')),
                ),
                array(
                    'label' => HApp::t('privacy'),
                    'url' => Yii::app()->createAbsoluteUrl('privacy'),
                    'itemOptions' => array('id' => 'privacyFooterNav'),
                    'linkOptions' => array('ajax' => HView::getAjaxMenuArrayConfig('loadView', 'ajax', array('view' => 'privacy'), 'privacy')),
                ),
            ),
            'htmlOptions' => array('class' => 'floatRight'),
        ));
        ?>
</div>