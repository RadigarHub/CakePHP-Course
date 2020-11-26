<div class="well">
    <h2><?= $current_user['first_name'] . ' ' . $current_user['last_name'] ?></h2>
    <br>
    <dl>
        <dt>Nombre</dt>
        <dd>
            <?= $user->first_name ?>
        </dd>
        <br>
        <dt>Apellidos</dt>
        <dd>
            <?= $user->last_name ?>
        </dd>
        <br>
        <dt>Correo electrónico</dt>
        <dd>
            <?= $user->email ?>
        </dd>
        <br>
        <dt>Habilitado</dt>
        <dd>
            <?= $user->active ? 'SI' : 'NO' ?>
        </dd>
        <br>
        <dt>Creado</dt>
        <dd>
            <?= $user->created->nice() ?>
        </dd>
        <br>
        <dt>Modificado</dt>
        <dd>
            <?= $user->modified->nice() ?>
        </dd>
        <br>
    </dl>
</div>