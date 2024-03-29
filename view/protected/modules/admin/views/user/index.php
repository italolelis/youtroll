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
                    <?= __("E-mail", "admin"); ?>
                </th>
                <th>
                    <?= __("Ações", "admin"); ?>
                </th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($model as $m): ?>
                <tr>
                    <td>
                        <?= $m->usr_id; ?>
                    </td>
                    <td>
                        <?= $m->usr_username; ?>
                    </td>
                    <td>
                        <?= $m->usr_email; ?>
                    </td>
                    <td class="button-column">
                        <?php
                        $this->widget('bootstrap.widgets.TbButton', array(
                            'label' => 'Edit',
                            'size' => 'mini',
                            'type' => 'primary',
                            'url' => Yii::app()->createAbsoluteUrl("admin/user/" . $m->usr_id),
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
        </tbody>
    </table>
</div>

<?= $this->renderPartial('application.modules.admin.views.user.modals.editModal') ?>

<script>
    $(".edit").on("click", function(){
        $.get($(this).attr("href"), function(data){
            $("#content-modal-edit-user").html(data);
        }).complete(function(){
            loadConfig();
        });    
    });
</script>