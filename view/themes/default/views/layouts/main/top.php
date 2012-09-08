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
        <div id="log">
            <?=
                CHtml::image(Yii::app()->theme->baseUrl . "/resources/images/login-icon.png", "Login",
                    array(
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
    <div class="clear"></div>
</div>