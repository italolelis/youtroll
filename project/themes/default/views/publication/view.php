<h2 class="page-title"><?= $publication->title ?></h2>

<div id="publication" class="two-third">
    <div id="imageHeader">
        <?= CHtml::button($channel->name, array('class' => 'button large channelStyle')) ?>
        <?php
        if (!Yii::app()->user->isGuest && Yii::app()->user->getId() != $channel->owner) {
            echo CHtml::ajaxButton(HApp::t('subscribe'), array('channel/subscribe'), HView::getAjaxSubmitButtonConfig(array('channel' => $publication->channel)),
                array(
                    'id' => 'subscribeButton',
                    'class' => 'button large subscribeButton ' . ($userSubscribe ? 'displayNone' : ''),
                    'live' => false,
                )
            );
            echo CHtml::ajaxButton(HApp::t('unsubscribe'), array('channel/unsubscribe'), HView::getAjaxSubmitButtonConfig(array('channel' => $publication->channel)),
                array(
                    'id' => 'unsubscribeButton',
                    'class' => 'button large ' . (!$userSubscribe ? 'displayNone' : ''),
                    'live' => false,
                )
            );
        }
        ?>
    </div>

    <div id="image" class="marginTop">
        <?= CHtml::image(HView::getImageUrl($publication->owner, $publication->image_path), $publication->title) ?>
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

    <div id="imageShare" class="infobox displayNone">
        
        <?= CHtml::textField('url', HApp::getCurrentUrl()) ?>
        
        <div id="social" class="floatRight">
            <?= CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . '/resources/img/icon-share-facebook.png', HApp::t('fbShare') . ' - ' . $publication->title), 'http://www.facebook.com/sharer.php?u=' . HApp::getCurrentUrl() . '&t=' . urlencode($publication->title), array('target' => '_blank')) ?>
            <?= CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . '/resources/img/icon-share-twitter.png', HApp::t('twitterShare') . ' - ' . $publication->title), 'http://www.twitter.com/share?url=' . HApp::getCurrentUrl() . '&text=' . urlencode($publication->title), array('target' => '_blank')) ?>
            <?= CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . '/resources/img/icon-share-google.png', HApp::t('g+Share') . ' - ' . $publication->title), 'http://plus.google.com/share?url=' . HApp::getCurrentUrl(), array('target' => '_blank')) ?>
        </div>
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
            echo CHtml::ajaxButton(HApp::t(''), array('publication/assess'), HView::getAjaxSubmitButtonConfig(array('publication' => HSecurity::urlEncode($publication->id), 'like' => false)),
                array(
                    'id' => 'unlikeButton',
                    'class' => 'button medium buttonStyle unlikeButton' . (is_null($review->like) ? '' : (!$review->like ? ' active' : '')),
                    'live' => false,
                )
            );
            echo CHtml::ajaxButton(HApp::t('share'), array('publication/share'), HView::getAjaxSubmitButtonConfig(), array(
                'id' => 'shareButton',
                'class' => 'button medium buttonStyle marginLeft',
            ));
            ?>
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
        <div>   
            <div class="jcarousel-skin-yt">
                <ul>
                    <?php foreach ($publicationsRelated as $publicationRelated): ?>
                        <li class="publicationRelated">
                            <?php
                            echo CHtml::link(
                                CHtml::image(HView::getThumbUrl($publicationRelated->owner, $publicationRelated->image_path), $publicationRelated->title) . "<h5 style='title'>$publicationRelated->title</h5>" . '<span class="categories">' . Category::getNameByID($publicationRelated->category) . '</span>',
                                Yii::app()->createAbsoluteUrl('', array('view' => HSecurity::urlEncode("{$publicationRelated->id}"))),
                                array('class' => 'publicationRelated')
                            );
                            ?>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>
    </div>
</div>