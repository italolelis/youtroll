<!DOCTYPE html>
<html>
    <head>
        <?=$this->renderPartial('webroot.themes.'.Yii::app()->theme->name.'.views.layouts.'.Yii::app()->layout.'.head')?>
    </head>
    <body>
        <!-- BEGIN menu -->
        <header class="header_silverbackground">
            <?=$this->renderPartial('webroot.themes.'.Yii::app()->theme->name.'.views.layouts.'.Yii::app()->layout.'.top')?>
        </header>
        <div id="content">
            <?php echo $content ?>
        </div>
        <div id="modals">
            <?=$this->renderPartial('webroot.themes.'.Yii::app()->theme->name.'.views.layouts.'.Yii::app()->layout.'.modals.loginForm')?>
        </div>
        <!-- BEGIN footer -->
        <footer id="footer"> 
            <?=$this->renderPartial('webroot.themes.'.Yii::app()->theme->name.'.views.layouts.'.Yii::app()->layout.'.footer')?>
        </footer>

        <!-- /END footer -->

    </body>
</html>