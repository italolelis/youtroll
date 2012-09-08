<h1>
    <?= Yii::t("admin", "Users"); ?>
</h1>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>
                <?= Yii::t("admin", "Id"); ?>
            </th>
            <th>
                <?= Yii::t("admin", "Nome"); ?>
            </th>
            <th>
                <?= Yii::t("admin", "Email"); ?>
            </th>
        </tr>
    </thead>
    <tbody>    
        <? foreach ($model as $user): ?>
            <tr>
                <td>
                    <?= $user->usr_id ?>
                </td>
                <td>
                    <?= $user->usr_name ?>
                </td>
                <td>
                    <?= $user->usr_email ?>
                </td>
            </tr>
        <? endforeach; ?>
    </tbody>
</table>
<a class="toggle-link" href="#new-project"><i class="icon-plus"></i> New Project</a>