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
        
        <?php echo $content ?>
        
        <div id="modals">
            <?=$this->renderPartial('webroot.themes.'.Yii::app()->theme->name.'.views.layouts.'.Yii::app()->layout.'.modals.loginModal')?>
        </div>
        <!-- BEGIN footer -->
        <footer id="footer"> 
            <?=$this->renderPartial('webroot.themes.'.Yii::app()->theme->name.'.views.layouts.'.Yii::app()->layout.'.footer')?>
        </footer>

        <!-- /END footer -->

    </body>
</html>