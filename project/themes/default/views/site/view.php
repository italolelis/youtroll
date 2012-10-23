<h2 class="slogan"><?= $publication->title ?></h2>
<div class="two-third">
    <?= CHtml::image(Yii::app()->baseUrl . "/resources/img/user/$owner->username/$publication->image_path") ?>
</div>
<div class="one-third">
    empty
</div>