<h2 class="page-title"><?= $publication->title ?></h2>
<div id="publication" class="two-third">
    <div id="imageHeader">
        <?= CHtml::button($owner->username, array('class' => 'button large usernameStyle')) ?>
        <?= CHtml::button(HApp::t('subscribe'), array('class' => 'button large')) ?>
    </div>
    <div id="image" class="marginTop">
        <?= CHtml::image(Yii::app()->baseUrl . "/resources/img/user/$owner->username/$publication->image_path", $publication->title) ?>
    </div>
    <div id="imageButtons">
        
    </div>
    <div id="imageDate">
        <?= Yii::t('app', 'publicationDate', array('{date}' => $publication->record, '{username}' => $owner->username)); ?>
    </div>
    <div id="imageDescription" class="infobox">
        <div><?= $publication->description ?></div>
        <div class="marginTop">
            <strong><?= HApp::t('category') ?>:</strong>
            <p><?= Category::getNameByID($publication->category) ?>:</p>
            <strong><?= HApp::t('defaultLicense') ?>:</strong>
            <p><?= HApp::t('appDefaultLicense') ?></p>
        </div>
    </div>
</div>
<div class="one-third">
    empty
</div>