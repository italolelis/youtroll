
<!DOCTYPE html>
<html>
    <head>
        <?= CHtml::metaTag("UTF-8", "charset") ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CONNECT template</title>

        <?php Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . "/resources/style.css"); ?>
        <?php Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . "/resources/css/menu.css"); ?>
        <?php Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . "/resources/css/slider.css"); ?>
        <?php Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . "/resources/css/css_slider1/default.css", "screen"); ?>
        <?php Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . "/resources/css/css_slider1/nivo-slider.css", "screen"); ?>
        <?php Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . "/resources/css/hover.css"); ?>
        <?php Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . "/resources/css/hover.css"); ?>
        <?php Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . "/resources/css/columns.css"); ?>
        <?php Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . "/resources/css/hover_image.css"); ?>
        <?php Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . "/resources/css/lightbox.css"); ?>
        <?php Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . "/resources/css/buttons.css"); ?>
        <?php Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . "/resources/css/widgets.css"); ?>
        <?php Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . "/resources/css/light.css"); ?>
        <?php Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . "/resources/css/stimenu.css"); ?>
        <?php Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . "/resources/css/responsive.css"); ?>

        <!--[if IE 8]>
        <link href="css/style_IE.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="js/ie.html5.js"></script>
        <![endif]-->

        <!-- JQUERY -->
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . "/resources/js/jquery-1.7.2.min.js", CClientScript::POS_HEAD); ?>
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . "/resources/js/jquery.easing.1.3.js"); ?>

        <!-- JQUERY_UI -->
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . "/resources/js/jquery.ui.core.js"); ?>

        <!-- SLIDER -->
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . "/resources/js/jquery.cycle.js"); ?>
        <script type="text/javascript">
            $(window).load(function() {
                $("#scroller .items").cycle({ 
                    fx: 'scrollUp' 	
                });
            });
        </script>

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

        <!-- SLIDER_TIMELINE -->
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . "/resources/js/jquery.timeline.min.js"); ?>
        <script type="text/javascript">

            $(window).load(function() {
                // dark
                $('.timelineLight').timeline({
                    openTriggerClass : '.read_more',
                    startItem : '15/08/2012'
                });
            });
        </script>

        <!-- SLIDER_PIECEMAKER
        <script type="text/javascript" src="js/swfobject.js"></script>
        -->

        <!-- MENU -->
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . "/resources/js/menu.js"); ?>
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . "/resources/js/jquery.iconmenu.js"); ?>

        <!-- SERVICES -->
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . "/resources/js/jquery.quicksand.js"); ?>
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . "/resources/js/services.js"); ?>

        <!-- HOVER_BUTTON -->
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . "/resources/js/hover.js"); ?>
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . "/resources/js/buttons.js"); ?>

        <!-- IMAGE -->
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . "/resources/js/image.js"); ?>
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . "/resources/js/lightbox.js"); ?>
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . "/resources/js/jquery.capSlide.js"); ?>

        <!-- GALLERY 
        <script src="js/lazyload.js" type="text/javascript"></script>
        <script src="js/gallery.js" type="text/javascript"> </script>
        <script src="js/jquery.masonary.js" type="text/javascript"> </script>
        -->


    </head>


    <body>


        <!-- BEGIN menu -->
        <header class="header_silverbackground">
            <div class="menu">
                <!-- BEGIN logo -->
                <a class="logo" href="<?= Yii::app()->baseUrl ?>">
                    <?= CHtml::image(Yii::app()->theme->baseUrl . "/resources/images/logo.png", "logo") ?>
                </a>
                <!-- /END logo -->

                <div class="blockeasing-wrapp">
                    <h6 class="blockeasing-header">Menu</h6>
                    <ul class="blockeasing">
                        <li class="current"><a href="index.html"><?= Yii::t("app", "HOME") ?></a>
                            <ul>
                                <li><a href="index.html">SLIDE 1</a>
                                    <ul>
                                        <li><a href="index_layout_v1.html">HOME LAYOUT V1</a></li>
                                    </ul>
                                </li>
                                <li><a href="index1.html">SLIDE 2</a>
                                    <ul>
                                        <li><a href="index1_layout_v1.html">HOME LAYOUT V1</a></li>
                                    </ul>
                                </li>
                                <li><a href="index2.html">SLIDE 3</a>
                                    <ul>
                                        <li><a href="index2_layout_v1.html">HOME LAYOUT V1</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#">SOBRE</a></li>
                        <li><a href="blog.html">BLOG</a>
                            <ul>
                                <li><a href="blog_post.html">POST EXAMPLE</a></li>
                            </ul>
                        </li>		      
                        <li><a href="services.html">SERVICES</a>
                            <ul>
                                <li><a href="services_page.html">SERVICES PAGE</a></li>
                            </ul>
                        </li>
                        <li><a href="gallery.html">GALLERY</a></li>
                        <li><a href="#">FEATURES</a>
                            <ul>
                                <li><a href="icons.html">ICONS</a></li>
                                <li><a href="elements.html">ELEMENTS</a></li>
                                <li><a href="columns.html">COLUMNS</a></li>
                                <li><a href="typography.html">TYPOGRAPHY</a></li>
                            </ul>
                        </li>
                        <li><a href="contact.html">CONTACT</a></li>
                    </ul>
                </div>
                <div class="clear"></div>
            </div> 
        </header>
        <!-- /END menu -->

        <?php echo $content ?>

        <!-- BEGIN footer -->
        <footer id="footer"> 
            <div id="footer-wrapper">
                <div class="footer-column">
                    <div class="widget"> 
                        <h5>CONTACT US</h5>
                        <ul>
                            <li>Company Name</li>
                            <li>Sezamee street 1109</li>
                            <li>Quahog, Long Island</li>
                            <li>+99.520.179</li>
                            <li>+99.520.178</li>
                            <li><a href="mailto:office@companyname.com" class="footer_link">office@companyname.com</a></li>
                            <li><a href="www.companyname.com" class="footer_link">www.companyname.com</a></li>
                        </ul>
                    </div> 
                </div>

                <div class="footer-column">
                    <div class="widget"> 
                        <h5>LATEST WORK</h5>
                        <ul>
                            <li>1. Fenix NLM business card</li>
                            <li>2. Fertico branding</li>
                            <li>3. Medeja website design</li>
                            <li>4. CrowwnBet logo design</li>
                            <li>5. CopyPaste banner</li>
                            <li>6. Fitofer package redesign</li>
                            <li>7. Control P flyer design </li>  
                        </ul>
                    </div> 
                </div>

                <div class="footer-column last">
                    <div class="widget"> 
                        <h5>FOLLOW US</h5>
                        <div class="clear"></div>
                        <p>Keep in touch with our  latest design, participate in some of the creation processes and connect with our great designers.</p>
                        <!-- BEGIN social icon -->
                        <div class="fadehover hoverfooter">
                            <a class="a" href="#"><?= CHtml::image(Yii::app()->theme->baseUrl . "/resources/images/f.png", "facebook") ?></a>
                            <a class="b" href="#"><?= CHtml::image(Yii::app()->theme->baseUrl . "/resources/images/f1.png", "facebook") ?></a>
                        </div>
                        <div class="fadehover hoverfooter">
                            <a class="a" href="#"><?= CHtml::image(Yii::app()->theme->baseUrl . "/resources/images/t.png", "twitter") ?></a>
                            <a class="b" href="#"><?= CHtml::image(Yii::app()->theme->baseUrl . "/resources/images/t1.png", "twitter") ?></a>
                        </div>
                        <div class="fadehover hoverfooter">
                            <a class="a" href="#"><?= CHtml::image(Yii::app()->theme->baseUrl . "/resources/images/g.png", "google+") ?></a>
                            <a class="b" href="#"><?= CHtml::image(Yii::app()->theme->baseUrl . "/resources/images/g1.png", "google+") ?></a>
                        </div>
                        <div class="fadehover hoverfooter">
                            <a class="a" href="#"><?= CHtml::image(Yii::app()->theme->baseUrl . "/resources/images/r.png", "rss") ?></a>
                            <a class="b" href="#"><?= CHtml::image(Yii::app()->theme->baseUrl . "/resources/images/r1.png", "rss") ?></a>
                        </div>
                        <!-- /END social icon -->
                    </div>      
                </div>
                <div class="clear"></div>


                <!--loverbar info-->
                <div class="footer-info">

                    <h5 class="no-marg-bott padd-top padd-bott5">COMPANY LOCANTION & INFO</h5>
                    <div class="footer-border"></div>
                    <div class="padd-top">
                        <?=
                        CHtml::image(Yii::app()->theme->baseUrl . "/resources/images/footer-map.png", null, array(
                            "class" => "left footer-info-map"
                        ))
                        ?>
                        <div class="footer-info-text">
                            <h5>LOCATE US</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at semper risus. Phasellus at semper risus. Lorem ipsum dolor sit amet, consectetur adipiscing</p>
                        </div>
                        <div class="footer-info-picks">
                            <h5>WHO WE ARE</h5>
                            <a class="image_rollover_left" data-description="READ MORE" href="#">
                                <?= CHtml::image(Yii::app()->theme->baseUrl . "/resources/images/footer/1.jpg") ?>
                            </a>
                            <a class="image_rollover_top" data-description="READ MORE" href="#">
                                <?= CHtml::image(Yii::app()->theme->baseUrl . "/resources/images/footer/2.jpg") ?>
                            </a>
                            <a class="image_rollover_bottom" data-description="READ MORE" href="#">
                                <?= CHtml::image(Yii::app()->theme->baseUrl . "/resources/images/footer/3.jpg") ?>
                            </a>
                            <a class="image_rollover_right" data-description="READ MORE" href="#">
                                <?= CHtml::image(Yii::app()->theme->baseUrl . "/resources/images/footer/4.jpg") ?>
                            </a>
                            <div class="clear"></<div>
                                </div>
                                <div class="clear">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style='clear: both;'/>
                </div>

                <!--/END loverbar info-->


                <div class="footer-border padd-top15"></div>


                <!--loverbar menu-->
                <ul class="footer-menu">
                    <li><a href="<?= Yii::app()->baseUrl ?>">Home</a></li>
                    <li><a href="<?= Yii::app()->createAbsoluteUrl("site/about") ?>"><?= Yii::t("app", "Sobre") ?></a></li>
                    <li><a href="<?= Yii::app()->createAbsoluteUrl("site/privacy") ?>"><?= Yii::t("app", "Privacidade") ?></a></li>
                    <li><a href="<?= Yii::app()->createAbsoluteUrl("site/terms") ?>"><?= Yii::t("app", "Termos de Uso") ?></a></li>
                    <li><a href="<?= Yii::app()->createAbsoluteUrl("site/help") ?>"><?= Yii::t("app", "Ajuda") ?></a></li>
                </ul>

                <div class="footer-copyright">All rights reserved - Connect Studios 2012</div>
                <!--/END loverbar menu-->


                <div class="clear"></div>

            </div>

        </footer>

        <!-- /END footer -->

    </body>
</html>