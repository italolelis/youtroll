<h2 class="page-title"><?= $publication->title ?></h2>
<div id="publication" class="two-third">
    <div id="imageHeader">
        <?= CHtml::button($owner->email, array('class' => 'button large channelStyle')) ?>
        <?= CHtml::button(HApp::t('subscribe'), array('class' => 'button large')) ?>
    </div>
    <div id="image" class="marginTop">
        <?= CHtml::image(Yii::app()->baseUrl . "/resources/img/user/$owner->email/$publication->image_path", $publication->title) ?>
    </div>
    <div id="imageButtonsStats">
        <div id="imageButtons" class="displayInline">
            <?php
            echo CHtml::ajaxButton(HApp::t('like'), array('publication/assess'),
                    HView::getAjaxSubmitButtonConfig(array('publication' => HSecurity::urlEncode($publication->id), 'like' => true)),
                    array(
                        'id' => 'likeButton',
                        'class' => 'button medium buttonStyle likeButton',
                        'live' => false,
                    )
                );
            ?>
            <?php
            echo CHtml::ajaxButton(HApp::t(''), array('publication/assess'),
                    HView::getAjaxSubmitButtonConfig(array('publication' => HSecurity::urlEncode($publication->id), 'like' => false)),
                    array(
                        'id' => 'unlikeButton',
                        'class' => 'button medium buttonStyle unlikeButton',
                        'live' => false,
                    )
                );
            ?>
            <?= CHtml::button(HApp::t('share'), array('class' => 'button medium buttonStyle marginLeft')) ?>
            <?= CHtml::button('', array('class' => 'button medium buttonStyle signalButton')) ?>
        </div>
        <div id="imageStats" class="floatRight">
            <h3 class="alignRight"><?= $publication->hits + $publication->fake_hits ?></h3>
            <?php
            $likes = ($publication->like * 100) / (($publication->like + $publication->unlike) ?: 1);
            
            $this->widget('zii.widgets.jui.CJuiProgressBar', array(
                'value' => $likes,
                'cssFile' => '',
                'htmlOptions' => array(
                    'id' => 'likes-unlikes',
                    'class' => 'progress progress-success' . ($likes ? ' progress-populated' : ''),
                ),
            ));
            ?>
            <p class="alignRight"><?= Yii::t('app', 'publicationStats', array('{likes}' => $publication->like, '{unlikes}' => $publication->unlike)) ?></p>
        </div>
    </div>
    <div id="imageDate" class="marginTop">
        <?= Yii::t('app', $owner->name ? 'publicationDateWithName' : 'publicationDate', array('{date}' => $publication->record, '{name}' => $owner->name)); ?>
    </div>
    <div id="imageDescription" class="infobox">
        <div><?= $publication->description ?></div>
        <div class="marginTop">
            <strong><?= HApp::t('category') ?>:</strong>
            <p><?= Category::getNameByID($publication->category) ?>:</p>
            <strong><?= HApp::t('license') ?>:</strong>
            <p><?= HApp::t('defaultLicense') ?></p>
        </div>
    </div>
</div>
<div class="one-third">
    Tirinhas Relacionadas Aqui
</div>