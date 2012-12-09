<?php
foreach (Category::getNames() as $key => $category) {
    $keyName = Category::getKeyNameByID($key);
    $categories[] = array(
        'label' => $category,
        'url' => array("category/$keyName"),
        'linkOptions' => array('ajax' => HView::getAjaxMenuArrayConfig($keyName, 'category')),
    );
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
                        'visible' => false,
                    ),
                    array(
                        'label' => HApp::t('createPublication'),
                        'url' => array('publication/create'),
                        'itemOptions' => array('id' => 'createNav'),
                        'linkOptions' => array('ajax' => HView::getAjaxMenuArrayConfig('create', 'publication')),
                        'visible' => false,
                    ),
                    array(
                        'label' => HApp::t('sendPublication'),
                        'url' => array('publication/send'),
                        'itemOptions' => array('id' => 'sendNav'),
                        'linkOptions' => array('ajax' => HView::getAjaxMenuArrayConfig('send', 'publication')),
                    ),
                ),
                'itemOptions' => array('id' => 'controlPanelNav'),
                'linkOptions' => array('ajax' => HView::getAjaxMenuArrayConfig('controlPanel', 'user')),
                'visible' => !Yii::app()->user->isGuest,
            ),
            array(
                'label' => HApp::t('categories'),
                'url' => '#',//array('category/list'),
                'items' => $categories,
                'itemOptions' => array('id' => 'categoriesNav', 'onClick' => 'return false;'),
//                'linkOptions' => array('ajax' => HView::getAjaxMenuArrayConfig('categories', 'site')),
            ),
            array(
                'label' => HApp::t('about'),
                'url' => Yii::app()->createAbsoluteUrl('about'),
                'itemOptions' => array('id' => 'aboutNav'),
                'linkOptions' => array('ajax' => HView::getAjaxMenuArrayConfig('loadView', 'ajax', array('view' => 'about'), 'about')),
            ),
            array(
                'label' => HApp::t('logout'),
                'url' => array('user/logout'),
                'itemOptions' => array('id' => 'logoutNav'),
                'visible' => !Yii::app()->user->isGuest,
            ),
        ),
    ));
    ?>
</div>