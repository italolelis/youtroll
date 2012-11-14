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
                    'itemOptions' => array('id' => 'termsNav'),
                    'linkOptions' => array('ajax' => HView::getAjaxMenuArrayConfig('terms')),
                ),
            ),
            'htmlOptions' => array('class' => 'floatRight'),
        ));
        ?>
</div>