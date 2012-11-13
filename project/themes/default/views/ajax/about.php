<h1 class="page-title"><?= HApp::t('aboutTitle') ?></h1>

<div class="two-third alignJustify">
    <div class="infobox">
        <div><?= HApp::t('about_1_1.1', 'texts') ?></div>
        <div class="marginTop"><?= HApp::t('about_1_1.2', 'texts') ?></div>
        
        <h5 class="section-title marginTop"><?= HApp::t('about_1_2', 'texts') ?></h5>
        <div class="marginTop"><?= HApp::t('about_1_2.1', 'texts') ?></div>
        <div class="marginTop"><?= HApp::t('about_1_2.2', 'texts') ?></div>
        
        <h5 class="section-title marginTop"><?= HApp::t('about_1_3', 'texts') ?></h5>
        <div class="marginTop"><?= HApp::t('about_1_3.1', 'texts') ?></div>
        
        <h5 class="section-title marginTop"><?= HApp::t('about_1_4', 'texts') ?></h5>
        <div class="marginTop"><?= HApp::t('about_1_4.1', 'texts') ?></div>
        
        <h5 class="section-title marginTop"><?= HApp::t('about_1_5', 'texts') ?></h5>
        <div class="marginTop"><?= HApp::t('about_1_5.1', 'texts') ?></div>
        <ul class="arrow-2 dotted marginTop">
            <li><strong><?= HApp::t('email') ?>:</strong> <?= CHtml::link(HApp::t('contactEmail'), 'mailto:'.HApp::t('contactEmail')) ?></li>
        </ul>
    </div>
</div>
<div class="one-third last">
    <div class="infobox">
        <h5 class="section-title"><?= HApp::t('about_2_1', 'texts') ?></h5>
        <ul class="arrow dotted marginTop">
            <?php foreach (Yii::app()->params['team'] as $member): ?>
                <li><?= $member ?>.</li>
            <?php endforeach; ?>
        </ul>
        <h5 class="section-title marginTop"><?= HApp::t('about_2_2', 'texts') ?></h5>
        <div class="marginTop"><?= HApp::t('about_2_2.1', 'texts') ?></div>
        <div><?= HApp::t('about_2_2.2', 'texts') ?></div>
        <ul class="arrow-2 dotted marginTop">
            <li><strong><?= HApp::t('email') ?>:</strong> <?= CHtml::link(HApp::t('jobsEmail'), 'mailto:'.HApp::t('jobsEmail')) ?></li>
        </ul>
    </div>
</div>