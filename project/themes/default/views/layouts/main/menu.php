<?php
foreach ($this->categories as $categorie) {
    $categories[] = array('label' => HApp::t($categorie->name, 'categories'), 'url' => array("categorie/$categorie->id"));
}
?>

<div id="main-nav">
    <?php
    $this->widget('zii.widgets.CMenu', array(
        'id' => 'menu',
        'activeCssClass' => 'current',
        'items' => array(
            array(
                'label' => HApp::t('home'),
                'url' => array('site/index'),
                'itemOptions' => array('id' => 'indexNav'),
                'linkOptions' => array('ajax' => HView::getAjaxMenuArrayConfig('index', 'site')),
            ),
            array(
                'label' => HApp::t('login'),
                'url' => array('user/login'),
                'itemOptions' => array('id' => 'loginNav'),
                'linkOptions' => array('ajax' => HView::getAjaxMenuArrayConfig('login', 'user')),
                'visible' => Yii::app()->user->isGuest,
            ),
            array(
                'label' => HApp::t('signUp'),
                'url' => array('user/signUp'),
                'itemOptions' => array('id' => 'signUpNav'),
                'linkOptions' => array('ajax' => HView::getAjaxMenuArrayConfig('signUp', 'user')),
                'visible' => Yii::app()->user->isGuest,
            ),
            array(
                'label' => HApp::t('controlPanel'),
                'url' => array('user/controlPanel'),
                'items' => array(
                    array(
                        'label' => HApp::t('myChannel'),
                        'url' => array('user/channel'),
                        'itemOptions' => array('id' => 'channelNav'),
                        'linkOptions' => array('ajax' => HView::getAjaxMenuArrayConfig('channel', 'user')),
                    ),
                    array(
                        'label' => HApp::t('createImage'),
                        'url' => array('user/createImage'),
                        'itemOptions' => array('id' => 'createImageNav'),
                        'linkOptions' => array('ajax' => HView::getAjaxMenuArrayConfig('createImage', 'user')),
                    ),
                    array(
                        'label' => HApp::t('sendImage'),
                        'url' => array('user/sendImage'),
                        'itemOptions' => array('id' => 'sendImageNav'),
                        'linkOptions' => array('ajax' => HView::getAjaxMenuArrayConfig('sendImage', 'user')),
                    ),
                ),
                'itemOptions' => array('id' => 'controlPanelNav'),
                'linkOptions' => array('ajax' => HView::getAjaxMenuArrayConfig('controlPanel', 'user')),
                'visible' => !Yii::app()->user->isGuest,
            ),
            array(
                'label' => HApp::t('categories'),
                'url' => array('site/categories'),
                'items' => $categories,
                'itemOptions' => array('id' => 'categoriesImageNav'),
                'linkOptions' => array('ajax' => HView::getAjaxMenuArrayConfig('categories', 'site')),
            ),
            array(
                'label' => HApp::t('about'),
                'url' => array('site/about'),
                'itemOptions' => array('id' => 'aboutImageNav'),
                'linkOptions' => array('ajax' => HView::getAjaxMenuArrayConfig('about')),
            ),
            array(
                'label' => HApp::t('logout'),
                'url' => array('user/logout'),
                'itemOptions' => array('id' => 'logoutImageNav'),
                'visible' => !Yii::app()->user->isGuest,
            ),
        ),
    ));
    ?>
</div>