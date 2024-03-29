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
                    'label' => Yii::t('app', 'createImage'),
                    'url' => array('user/createImage'),
                    'visible' => !Yii::app()->user->isGuest),
                array(
                    'label' => Yii::t('app', 'sendImage'),
                    'url' => array('user/sendImage'),
                    'visible' => !Yii::app()->user->isGuest),
                array(
                    'label' => Yii::t('app', 'categories'),
                    'url' => array('user/categories'),
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
                array('label' => Yii::t('app', 'logout'), 'url' => array('user/logout'),
                    'visible' => !Yii::app()->user->isGuest),
            ),
        ));
        ?>
        <div id="log">
            <?php
            echo CHtml::image(Yii::app()->theme->baseUrl . "/resources/images/login-icon.png", "Login", array(
                'class' => 'login',
                'data-toggle' => 'modal',
                'data-target' => '#loginModal',
                'rel' => 'tooltip',
                'title' => "Login",
                    )
                    
            );
            echo CHtml::label('Login', 'login')
            ?>
        </div>
        

    </div>
</div>