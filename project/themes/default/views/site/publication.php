<h2 class="page-title"><?= $publication->title ?></h2>
<div id="publication" class="two-third">
    <div id="imageHeader">
        <?= CHtml::button($owner->email, array('class' => 'button large channelStyle')) ?>
        <?= CHtml::button(HApp::t('subscribe'), array('class' => 'button large')) ?>
    </div>
    <div id="image" class="marginTop">
        <?= CHtml::image(Yii::app()->baseUrl . "/resources/img/user/$owner->email/$publication->image_path", $publication->title) ?>
    </div>
    <div id="imageButtons">
        <?= CHtml::button(HApp::t('like'), array('class' => 'button medium buttonStyle')) ?>
        <?= CHtml::button('', array('class' => 'button medium buttonStyle')) ?>
        <?= CHtml::button(HApp::t('share'), array('class' => 'button medium buttonStyle')) ?>
    </div>
    <div id="imageDate" class="marginTop">
        <?= Yii::t('app', $owner->name ? 'publicationDateWithName' : 'publicationDate', array('{date}' => $publication->record, '{name}' => $owner->name)); ?>
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