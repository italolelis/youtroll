<h2 class="page-title"><?= $publication->title ?></h2>

<div id="publication" class="two-third">
    <div id="imageHeader">
        <?= CHtml::button($owner->email, array('class' => 'button large channelStyle')) ?>
        <?= CHtml::button(HApp::t('subscribe'), array('class' => 'button large')) ?>
    </div>

    <div id="image" class="marginTop">
        <?= CHtml::image(Yii::app()->baseUrl . "/resources/img/user/$publication->owner/$publication->image_path", $publication->title) ?>
    </div>

    <div id="guestUser" class="infobox displayNone">
        <span>
            <?php
            echo Yii::t('app', 'guest', array(
                '{login}' => CHtml::link(HApp::t('accessAccount'), array('user/login'), array(
                    'id' => 'loginLink',
                    'ajax' => HView::getAjaxMenuArrayConfig('login', 'user')
                )),
                '{signUp}' => CHtml::link(HApp::t('signUp'), array('user/signUp'), array(
                    'id' => 'signUpLink',
                    'ajax' => HView::getAjaxMenuArrayConfig('signUp', 'user')
                )),
            ));
            ?>
        </span>
    </div>

    <div id="imageButtonsStats">
        <div id="imageButtons" class="displayInline">
            <?php
            echo CHtml::ajaxButton(HApp::t('like'), array('publication/assess'), HView::getAjaxSubmitButtonConfig(array('publication' => HSecurity::urlEncode($publication->id), 'like' => true)),
                    array(
                        'id' => 'likeButton',
                        'class' => 'button medium buttonStyle likeButton' . (is_null($review->like) ? '' : ($review->like ? ' active' : '')),
                        'live' => false,
                    )
            );
            ?>
            <?php
            echo CHtml::ajaxButton(HApp::t(''), array('publication/assess'), HView::getAjaxSubmitButtonConfig(array('publication' => HSecurity::urlEncode($publication->id), 'like' => false)),
                    array(
                        'id' => 'unlikeButton',
                        'class' => 'button medium buttonStyle unlikeButton' . (is_null($review->like) ? '' : (!$review->like ? ' active' : '')),
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
            $reviews = $stats->likes + $stats->unlikes;

            $this->widget('zii.widgets.jui.CJuiProgressBar', array(
                'value' => ($stats->likes * 100) / ($reviews ? : 1),
                'cssFile' => '',
                'htmlOptions' => array(
                    'id' => 'likes-unlikes',
                    'class' => 'progress progress-success' . ($reviews ? ' progress-populated' : ''),
                ),
            ));
            ?>
            <p class="alignRight"><?= Yii::t('app', 'publicationStats', array('{likes}' => $stats->likes, '{unlikes}' => $stats->unlikes)) ?></p>
        </div>
    </div>

    <div id="imageDate" class="marginTop">
        <?= Yii::t('app', $owner->name ? 'publicationDateWithName' : 'publicationDate', array('{date}' => $publication->record, '{name}' => $owner->name)); ?>
    </div>

    <div id="imageDescription" class="infobox">
        <div><?= $publication->description ?></div>
        <div>
            <p class="marginTop"><strong><?= HApp::t('category') ?>:</strong></p>
            <p><?= Category::getNameByID($publication->category) ?>:</p>
            <p class="marginTop"><strong><?= HApp::t('license') ?>:</strong></p>
            <p><?= HApp::t('defaultLicense') ?></p>
        </div>
    </div>

    <div id="imageComments" class="infobox">
        <div id="disqus_thread"></div>
        <script type="text/javascript">
            var disqus_shortname = 'ytroll';

            (function() {
                var dsq = document.createElement('script');
                dsq.type = 'text/javascript';
                dsq.async = true;
                dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
            })();
        </script>
    </div>
</div>

<div class="one-third">
    <div class="infobox">
        Tirinhas Relacionadas Aqui
    </div>
</div>