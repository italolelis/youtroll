<h2 class="page-title align-center"><?= HApp::t('slogan') ?></h2>

<?= $this->renderPartial('utils/jCarousel', array('title' => 'recentPublications', 'publications' => $recentPublications)) ?>
<?= $this->renderPartial('utils/jCarousel', array('title' => 'popularPublications', 'publications' => $popularPublications)) ?>
<?= $this->renderPartial('utils/jCarousel', array('title' => 'mostViewedPublications', 'publications' => $mostViewedPublications)) ?>
<?= $this->renderPartial('utils/jCarousel', array('title' => 'lessViewedPublications', 'publications' => $lessViewedPublications)) ?>