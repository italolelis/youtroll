<div id="yw28" class="grid-view">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>
                    <?= __("Id", "admin"); ?>
                </th>
                <th>
                    <?= __("Nome", "admin"); ?>
                </th>
                <th>
                    <?= __("Ações", "admin"); ?>
                </th>
            </tr>
        </thead>
        <tbody>    
            <?php if (!empty($model)): ?>
                <?php foreach ($model as $m): ?>
                    <tr>
                        <td>
                            <?= $m->cmc_ctg_id; ?>
                        </td>
                        <td>
                            <?= $m->cmc_ctg_description; ?>
                        </td>
                        <td class="button-column">
                            <?php
                            $this->widget('bootstrap.widgets.TbButton', array(
                                'label' => 'Edit',
                                'size' => 'mini',
                                'type' => 'primary',
                                'url' => Yii::app()->createAbsoluteUrl("admin/category/" . $m->cmc_ctg_id),
                                'htmlOptions' => array(
                                    'data-toggle' => 'modal',
                                    'class' => 'edit',
                                    'data-target' => '#editModal',
                                ),
                            ));
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
    <a class="toggle-link" href="<?= Yii::app()->createAbsoluteUrl("admin/category/create") ?>"><i class="icon-plus"></i> <?= __("New Category", "admin") ?></a>
</div>

<?= $this->renderPartial('application.modules.admin.views.user.modals.editModal') ?>

<script>
    $(".edit").on("click", function(){
        $.get($(this).attr("href"), function(){
            $(this).html();
        });
    })
</script>