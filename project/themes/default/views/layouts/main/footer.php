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
                    'linkOptions' => HView::getAjaxRenderConfig(),
                ),
                array(
                    'label' => HApp::t('categories'),
                    'url' => array('category/list'),
                    'itemOptions' => array('id' => 'categoriesFooterNav'),
                    'linkOptions' => HView::getAjaxRenderConfig('category', 'list'),
                    'visible' => false,
                ),
                array(
                    'label' => HApp::t('about'),
                    'url' => Yii::app()->createAbsoluteUrl('about'),
                    'itemOptions' => array('id' => 'aboutFooterNav'),
                    'linkOptions' => HView::getAjaxRenderConfig('ajax', 'loadView', array('view' => 'about'), 'about'),
                ),
            ),
        ));
        ?>
    </div>

    <ul class="contact-info">
        <li class="email"><?= CHtml::link(HApp::t('contactEmail'), 'mailto:'.HApp::t('contactEmail')) ?></li>
    </ul>

    <ul class="social-links floatRight">
        <li class="twitter"><?= CHtml::link('Twitter', 'https://twitter.com/y_troll', array('target' => '_blank')) ?></li>
        <li class="facebook"><?= CHtml::link('Facebook', 'https://www.facebook.com/pages/You-Troll/114115288756333', array('target' => '_blank')) ?></li>
        <li class="googleplus"><?= CHtml::link('Google Plus', 'https://plus.google.com/110941706737458001266', array('target' => '_blank')) ?></li>
        <li class="youtube"><?= CHtml::link('You Tube', 'http://www.youtube.com/YouTrollVideos', array('target' => '_blank')) ?></li>
        <li class="rss"><?= CHtml::link('RSS', Yii::app()->createAbsoluteUrl('feed'), array('target' => '_blank')) ?></li>
    </ul>
</div>