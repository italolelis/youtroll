<div class="menu">
    <!-- BEGIN logo -->
    <a class="logo" href="<?= Yii::app()->baseUrl ?>">
        <?= CHtml::image(Yii::app()->theme->baseUrl . "/resources/images/logo.png", "logo") ?>
    </a>
    <!-- /END logo -->

    <div class="blockeasing-wrapp">

        <?php
        $this->widget('zii.widgets.CMenu', array(
            'id' => 'menu',
            'activeCssClass' => 'current',
            'htmlOptions' => array('class' => 'blockeasing'),
            'items' => array(
                array(
                    'label' => Yii::t('app', 'home'),
                    'url' => array('site/index')),
                    'linkOptions' => array('data-toggle' => 'modal', 'data-target' => '#myModal',),
                array(
                    'label' => Yii::t('app', 'singUp'),
                    'url' => array('user/singUp'),
                    'visible' => Yii::app()->user->isGuest),
                array(
                    'label' => Yii::t('app', 'categories'),
                    'url' => array('user/singUp'),
                    'items' => array(
                        array(
                            'label' => Yii::t('app', 'Categorie 1'),
                            'url' => array('categorie/name'),
                        ),
                        array(
                            'label' => Yii::t('app', 'Categorie 2'),
                            'url' => array('categorie/name'),
                        )
                )),
                array('label' => Yii::t('app', 'about'), 'url' => array('site/about')),
            ),
        ));
        ?>
        <div id="log">
            <?=
            CHtml::image(Yii::app()->theme->baseUrl . "/resources/images/login-icon.png", "Login", array(
                'class' => 'login',
                'data-toggle' => 'modal',
                'data-target' => '#myModal',
                'rel' => 'tooltip',
                'title' => "Login",
                    )
            )
            ?>
        </div>

    </div>
</div>