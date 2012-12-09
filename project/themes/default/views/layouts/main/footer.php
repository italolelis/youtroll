<div class="container">
    <div id="footer-nav" class="clearfix">
        <?php
        $this->widget('zii.widgets.CMenu', array(
            'id' => 'footerMenu',
            'items' => array(
                array(
                    'label' => HApp::t('home'),
                    'url' => array('site/index'),
                    'itemOptions' => array('id' => 'indexFooterNav'),
                    'linkOptions' => array('ajax' => HView::getAjaxMenuArrayConfig('index', 'site')),
                ),
                array(
                    'label' => HApp::t('categories'),
                    'url' => array('category/list'),
                    'itemOptions' => array('id' => 'categoriesFooterNav'),
                    'linkOptions' => array('ajax' => HView::getAjaxMenuArrayConfig('list', 'category')),
                    'visible' => false,
                ),
                array(
                    'label' => HApp::t('about'),
                    'url' => Yii::app()->createAbsoluteUrl('about'),
                    'itemOptions' => array('id' => 'aboutFooterNav'),
                    'linkOptions' => array('ajax' => HView::getAjaxMenuArrayConfig('about')),
                ),
            ),
        ));
        ?>
    </div>

    <ul class="contact-info">
        <li class="email"><?= CHtml::link(HApp::t('contactEmail'), 'mailto:'.HApp::t('contactEmail')) ?></li>
    </ul>

    <ul class="social-links floatRight">
        <li class="twitter"><a href="#">Twitter</a></li>
        <li class="facebook"><a href="#">Facebook</a></li>
        <li class="googleplus"><a href="#">Google Plus</a></li>
        <li class="rss"><a href="#">RSS</a></li>
    </ul>
</div>