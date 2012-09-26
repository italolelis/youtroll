<?=CHtml::metaTag('text/html; charset=UTF-8', null, 'Content-Type')?>
<?=CHtml::metaTag('You Troll Team', 'author')?>
<?=CHtml::metaTag(Yii::app()->params['adminEmail'], 'reply-to')?>
<?=CHtml::metaTag('NetBeans IDE 7.0.2', 'generator')?>
<?=CHtml::metaTag('index, follow', 'robots')?>
<?=CHtml::metaTag('index, follow', 'googlebot')?>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title><?=Yii::t('app', 'name')?></title>

<?php
    Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . "/resources/style.css");
    Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . "/resources/css/menu.css");
    Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . "/resources/css/slider.css");
    Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . "/resources/css/css_slider1/default.css", "screen");
    Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . "/resources/css/css_slider1/nivo-slider.css", "screen");
    Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . "/resources/css/hover.css");
    Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . "/resources/css/hover.css");
    Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . "/resources/css/columns.css");
    Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . "/resources/css/hover_image.css");
//    Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . "/resources/css/lightbox.css");
    Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . "/resources/css/buttons.css");
    Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . "/resources/css/widgets.css");
    Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . "/resources/css/light.css");
    Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . "/resources/css/stimenu.css");
    Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . "/resources/css/responsive.css");
    
    //Jquery
    
    
    //Comentado por causa de conflito com upload file Rodolfo
    //Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . "/resources/js/jquery-1.7.2.min.js", CClientScript::POS_HEAD);
    
    Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . "/resources/js/jquery.easing.1.3.js");
    Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . "/resources/js/app/jquery-login.js");
    
    // JQuery UI
    Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . "/resources/js/jquery.ui.core.js");
    
    // Menu
    Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . "/resources/js/menu.js");
    Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . "/resources/js/jquery.iconmenu.js");

    // Services
    Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . "/resources/js/jquery.quicksand.js");
    Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . "/resources/js/services.js");

    // Hover Button
    Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . "/resources/js/hover.js");
    Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . "/resources/js/buttons.js");

    // Images
    Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . "/resources/js/image.js");
    Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . "/resources/js/lightbox.js");
    Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . "/resources/js/jquery.capSlide.js");
    
    Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . "/resources/js/jquery.maskedinput.js");
?>

<!--[if IE 8]>
<link href="css/style_IE.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/ie.html5.js"></script>
<![endif]-->



<!-- SLIDER_NIVO 
<script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script>
<script type="text/javascript">
    $(window).load(function() {
        $('.nivo_slider').nivoSlider({
                        manualAdvance: true,
                        directionNavHide:true});
    });
</script>
-->

<!-- SLIDER_PIECEMAKER
<script type="text/javascript" src="js/swfobject.js"></script>
-->

<!-- GALLERY 
<script src="js/lazyload.js" type="text/javascript"></script>
<script src="js/gallery.js" type="text/javascript"> </script>
<script src="js/jquery.masonary.js" type="text/javascript"> </script>
-->