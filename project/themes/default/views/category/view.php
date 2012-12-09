<h1 class="page-title"><?= $categoryName ?></h1>
<div class="infobox">
        <div>   
            <div class="jcarousel-skin-yt">
                <ul>
                    <?php foreach ($publications as $publication): ?>
                        <li class="publicationIndividual publicationCategory">
                            <?php
                            echo CHtml::link(
                                CHtml::image(HView::getImageUrl($publication->owner, $publication->image_path, true), $publication->title) . "<h5 style='title'>$publication->title</h5>" . '<span class="categories">' . Category::getNameByID($publication->category) . '</span>',
                                Yii::app()->createAbsoluteUrl('', array('view' => HSecurity::urlEncode("{$publication->id}"))),
                                array('class' => 'publicationIndividual')
                            );
                            ?>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>
    </div>