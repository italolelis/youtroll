<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>

<?= CHtml::scriptFile(Yii::app()->theme->baseUrl . '/resources/js/themeModernizrCustom.js') ?>
<?= CHtml::scriptFile(Yii::app()->theme->baseUrl . '/resources/js/themeCustom.js') ?>
<?= CHtml::scriptFile(Yii::app()->theme->baseUrl . '/resources/js/themeJCycle.js') ?>
<?= CHtml::scriptFile(Yii::app()->theme->baseUrl . '/resources/js/themeJFancybox.js') ?>


<!--
<?= CHtml::scriptFile(Yii::app()->theme->baseUrl . '/resources/js/themeJEasing.js') ?>
<?= CHtml::scriptFile(Yii::app()->theme->baseUrl . '/resources/js/themeJGMap.js') ?>
<?= CHtml::scriptFile(Yii::app()->theme->baseUrl . '/resources/js/themeJIsotope.min.js') ?>
<?= CHtml::scriptFile(Yii::app()->theme->baseUrl . '/resources/js/themeRespond.js') ?>
<?= CHtml::scriptFile(Yii::app()->theme->baseUrl . '/resources/js/themeJSmartStartSlider.js') ?>
-->

<?= CHtml::scriptFile(Yii::app()->baseUrl . '/resources/js/general.js') ?>
<?= CHtml::scriptFile(Yii::app()->theme->baseUrl . '/resources/js/script.js') ?>

<script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-37069336-1']);
    _gaq.push(['_setDomainName', 'youtroll.com.br']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

</script>