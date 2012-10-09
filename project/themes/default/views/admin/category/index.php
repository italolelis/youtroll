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
                    <?= HApp::t("Ações", "admin"); ?>
                </th>
            </tr>
        </thead>
        <tbody>    
            <?php if (!empty($model)): ?>
                <?php foreach ($model as $m): ?>
                    <tr>
                        <td>
                            <?= $m->id; ?>
                        </td>
                        <td>
                            <?= $m->name; ?>
                        </td>
                        <td class="button-column">
                            <?php
                            $this->widget('bootstrap.widgets.TbButton', array(
                                'label' => 'Edit',
                                'size' => 'mini',
                                'type' => 'primary',
                                'url' => Yii::app()->createAbsoluteUrl("admin/category/" . $m->id),
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
    <a id="add" data-toggle="modal" data-target="#addModal" class="toggle-link" href="<?= Yii::app()->createAbsoluteUrl("admin/category/add") ?>"><i class="icon-plus"></i> <?= HApp::t("New Category", "admin") ?></a>
</div>

<?= $this->renderPartial('modals/addModal') ?>
<?= $this->renderPartial('modals/editModal') ?>

<script>
    $(".edit").on("click", function(){
        $.get($(this).attr("href"), function(data){
            $("#content-modal-edit-category").html(data);
        }).complete(function(){
            loadConfig();
        });
    });
    
    $("#add").on("click", function(){
        $.get($(this).attr("href"), function(data){
            $("#content-modal-add-category").html(data);
        }).complete(function(){
            loadConfig();
        });
    });
    
</script>