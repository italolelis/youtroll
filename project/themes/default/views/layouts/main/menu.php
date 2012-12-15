<?php
foreach (Category::getNames() as $key => $category) {
    $keyName = Category::getKeyNameByID($key);
    $categories[] = array(
        'label' => $category,
        'url' => array("category/$keyName"),
        'itemOptions' => array('id' => "{$keyName}Nav"),
        'linkOptions' => HView::getAjaxRenderConfig('category', $keyName),
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
                'linkOptions' => HView::getAjaxRenderConfig(),
            ),
            array(
                'label' => HApp::t('login'),
                'url' => array('user/login'),
                'itemOptions' => array('id' => 'loginNav'),
                'linkOptions' => HView::getAjaxRenderConfig('user', 'login', null, 'login'),
                'visible' => Yii::app()->user->isGuest,
            ),
            array(
                'label' => HApp::t('signUp'),
                'url' => array('user/signUp'),
                'itemOptions' => array('id' => 'signUpNav'),
                'linkOptions' => HView::getAjaxRenderConfig('user', 'signUp'),
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
                        'linkOptions' => HView::getAjaxRenderConfig('user', 'channel'),
                        'visible' => false,
                    ),
                    array(
                        'label' => HApp::t('createPublication'),
                        'url' => array('#'),
                        'itemOptions' => array('id' => 'createNav'),
                        'linkOptions' => array('onClick' => 'return false;'),
                    ),
                    array(
                        'label' => HApp::t('sendPublication'),
                        'url' => array('publication/send'),
                        'itemOptions' => array('id' => 'sendNav'),
                        'linkOptions' => HView::getAjaxRenderConfig('publication', 'send'),
                    ),
                    array(
                        'label' => HApp::t('linkPublication'),
                        'url' => array('#'),
                        'itemOptions' => array('id' => 'linkNav'),
                        'linkOptions' => array('onClick' => 'return false;'),
                        'visible' => false,
                    ),
                ),
                'itemOptions' => array('id' => 'controlPanelNav'),
                'linkOptions' => HView::getAjaxRenderConfig('user', 'controlPanel'),
                'visible' => !Yii::app()->user->isGuest,
                'active' => strpos(HApp::getCurrentUrl(), 'publication') !== false,
            ),
            array(
                'label' => HApp::t('categories'),
                'url' => '#',//array('category/list'),
                'items' => $categories,
                'itemOptions' => array('id' => 'categoryNav', 'onClick' => 'return false;'),
//                'linkOptions' => HView::getAjaxRenderConfig('categories', 'list'),
                'active' => $this->route === 'category/view',
            ),
            array(
                'label' => HApp::t('about'),
                'url' => Yii::app()->createAbsoluteUrl('about'),
                'itemOptions' => array('id' => 'aboutNav'),
                'linkOptions' => HView::getAjaxRenderConfig('ajax', 'loadView', array('view' => 'about'), 'about'),
                'active' => strpos(HApp::getCurrentUrl(), 'about') !== false,
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