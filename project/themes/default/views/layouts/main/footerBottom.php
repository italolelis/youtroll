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
                    'url' => array('site/terms'),
                    'itemOptions' => array('id' => 'termsFooterNav'),
                    'linkOptions' => array('ajax' => HView::getAjaxMenuArrayConfig('terms')),
                ),
                array(
                    'label' => HApp::t('privacy'),
                    'url' => array('site/privacy'),
                    'itemOptions' => array('id' => 'privacyFooterNav'),
                    'linkOptions' => array('ajax' => HView::getAjaxMenuArrayConfig('privacy')),
                ),
            ),
            'htmlOptions' => array('class' => 'floatRight'),
        ));
        ?>
</div>