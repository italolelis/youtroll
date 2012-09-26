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