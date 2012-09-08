<h1>
    <?= __("Users", "admin"); ?>
</h1>
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