
<!DOCTYPE html>
<!--[if lt IE 7 ]><html lang="en" class="ie6 ielt7 ielt8 ielt9"><![endif]--><!--[if IE 7 ]><html lang="en" class="ie7 ielt8 ielt9"><![endif]--><!--[if IE 8 ]><html lang="en" class="ie8 ielt9"><![endif]--><!--[if IE 9 ]><html lang="en" class="ie9"> <![endif]--><!--[if (gt IE 9)|!(IE)]><!--> 
<html lang="en"><!--<![endif]--> 
    <head>
        <meta charset="utf-8">
        <title><?= HApp::t("Painel de controle - Youtroll") ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . "/resources/admin/js/jquery.maskedinput.js");?>
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . "/resources/admin/js/app/admin.js");?>
        
        <link href="<?= Yii::app()->theme->baseUrl . '/resources/admin/css/style.css' ?>" rel="stylesheet">
        <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    </head>
    <body>
        <div class="container">
            <div class="navbar">
                <div class="navbar-inner">
                    <div class="container">
                        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a> <a class="brand" href="#"><?= HApp::t("Youtroll") ?></a>
                        <div class="nav-collapse">
                            <ul class="nav">
                                <li class="active">
                                    <a href="index.htm">Dashboard</a>
                                </li>
                                <li>
                                    <a href="settings.htm">Account Settings</a>
                                </li>
                                <li>
                                    <a href="help.htm">Help</a>
                                </li>
                                <li class="dropdown">
                                    <a href="help.htm" class="dropdown-toggle" data-toggle="dropdown">Tours <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="help.htm">Introduction Tour</a>
                                        </li>
                                        <li>
                                            <a href="help.htm">Project Organisation</a>
                                        </li>
                                        <li>
                                            <a href="help.htm">Task Assignment</a>
                                        </li>
                                        <li>
                                            <a href="help.htm">Access Permissions</a>
                                        </li>
                                        <li class="divider">
                                        </li>
                                        <li class="nav-header">
                                            Files
                                        </li>
                                        <li>
                                            <a href="help.htm">How to upload multiple files</a>
                                        </li>
                                        <li>
                                            <a href="help.htm">Using file version</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <form class="navbar-search pull-left" action="">
                                <input type="text" class="search-query span2" placeholder="<?= HApp::t("Search...") ?>" />
                            </form>
                            <ul class="nav pull-right">
                                <li>
                                    <a href="profile.htm"><?php echo Yii::app()->user->getName(); ?></a>
                                </li>
                                <li>
                                    <a href="login.htm">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="span3">
                    <div class="well" style="padding: 8px 0;">
                        <ul class="nav nav-list">
                            <li class="nav-header">
                                <?= HApp::t("Youtroll") ?>
                            </li>

                            <?php
                            $this->widget('bootstrap.widgets.TbMenu', array(
                                'id' => 'menu',
                                'type' => 'pills',
                                'activeCssClass' => 'active',
                                'items' => array(
                                    array(
                                        'label' => HApp::t('Dashboard'),
                                        'url' => array('/admin'),
                                        'icon' => "home",
                                        'active' => ($this->route == "admin/default/index")
                                    ),
                                    array(
                                        'label' => HApp::t('Users'),
                                        'url' => array('user/'),
                                        'icon' => "user",
                                        'active' => ($this->route == "admin/user/list")
                                    ),
                                    array(
                                        'label' => HApp::t('Categories'),
                                        'url' => array('category/'),
                                        'icon' => "tags",
                                        'active' => ($this->route == "admin/category/list")
                                    )
                                ),
                            ));
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="span9">
                    <?php echo $content ?>
                </div>
            </div>
        </div>
        <script src="<?= Yii::app()->theme->baseUrl . '/resources/admin/js/site.js' ?>"></script>
    </body>
</html>