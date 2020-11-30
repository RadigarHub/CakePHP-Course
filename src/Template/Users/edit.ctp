<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="page-header">
            <h2>Editar usuario</h2>
        </div>
        <?= $this->Form->create($user) ?>
        <fieldset>
            <?= $this->element('users/fields') ?>
        </fieldset>
        <?= $this->Form->button('Guardar') ?>
        <?= $this->Form->end() ?>
    </div>
</div>
