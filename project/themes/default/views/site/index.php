<h2 class="page-title align-center"><?= HApp::t('slogan') ?></h2>

<h6 class="section-title"><?= HApp::t('recentPublications') ?></h6>

<div class="jcarousel-container jcarousel-container-horizontal jcarousel-container-div">
    <div class="jcarousel-clip jcarousel-clip-horizontal jcarousel-clip-div">
        <ul class="projects-carousel clearfix jcarousel-list jcarousel-list-horizontal jcarousel-list-ul">
            <?php
            $totalPublications = 0
            ?>

            <?php foreach ($recentPublications as $publication): ?>
                <?php ++$totalPublications ?>

                <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-<?= $totalPublications ?> jcarousel-item-<?= $totalPublications ?>-horizontal jcarousel-item-li" jcarouselindex="<?= $totalPublications ?>">
                    <a href="single-project.html">
                        <?= CHtml::image(str_replace('.', '_thumb.', Yii::app()->baseUrl . "/resources/img/user/$publication->owner/$publication->image_path", $publication->title)) ?>
                        <h5 class="title"><?= $publication->title ?></h5>
                        <span class="categories"><?= Category::getNameByID($publication->category) ?></span>
                    </a>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
    <div class="jcarousel-prev jcarousel-prev-horizontal jcarousel-prev-disabled jcarousel-prev-disabled-horizontal" style="display: block;" disabled="disabled"></div>
    <div class="jcarousel-next jcarousel-next-horizontal" style="display: block;"></div>
</div>