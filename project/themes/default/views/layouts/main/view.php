<div id="messages">
    <?php
    foreach (Yii::app()->user->getFlashes() as $key => $message) {
        echo "<p class='alert-$key'>$message</p>";
    }
    ?>
</div>
<div id="view">
    <?= $content ?>
</div>