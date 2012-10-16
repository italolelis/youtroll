<div id="yw28" class="grid-view">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>
                    <?= HApp::t("Id", "admin"); ?>
                </th>
                <th>
                    <?= HApp::t("Nome", "admin"); ?>
                </th>
                <th>
                    <?= HApp::t("E-mail", "admin"); ?>
                </th>
                <th>
                    <?= HApp::t("Ações", "admin"); ?>
                </th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($model as $m): ?>
                <tr>
                    <td>
                        <?= $m->id; ?>
                    </td>
                    <td>
                        <?= $m->username; ?>
                    </td>
                    <td>
                        <?= $m->email; ?>
                    </td>
                    <td class="button-column">
                        <?php
                        $this->widget('bootstrap.widgets.TbButton', array(
                            'label' => 'Editar',
                            'size' => 'mini',
                            'type' => 'primary',
                            'url' => Yii::app()->createAbsoluteUrl("admin/user/" . $m->id),
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

<?= $this->renderPartial('modals/editModal') ?>

<script>
    $(".edit").on("click", function(){
        $.get($(this).attr("href"), function(data){
            $("#content-modal-edit-user").html(data);
        }).complete(function(){
            loadConfig();
        });    
    });
</script>