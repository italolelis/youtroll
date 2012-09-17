<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id' => 'editModal')); ?>
<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4><?= __("Editar Categoria") ?></h4>
</div>

<div class="modal-body">
    <div id="content-modal-edit-category"></div>
</div>

<div class="modal-footer">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'label' => 'Close',
        'url' => '#',
        'htmlOptions' => array('data-dismiss' => 'modal'),
    ));
    ?>
</div>
<?php $this->endWidget(); ?>