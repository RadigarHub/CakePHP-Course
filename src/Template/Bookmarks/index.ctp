<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bookmark[]|\Cake\Collection\CollectionInterface $bookmarks
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h2>
                Mi lista
                <?= $this->Html->link('<span class="glyphicon glyphicon-plus"></span> Nuevo', ['controller' => 'bookmarks', 'action' => 'add'], ['class' => 'btn btn-primary pull-right', 'escape' => false]) ?>
            </h2>
        </div>
        <ul class="list-group">
            <?php foreach($bookmarks as $bookmark): ?>
            <li class="list-group-item">
                <h4 class="list-group-item-heading"><?= h($bookmark->title) ?></h4>
                <p>
                    <strong class="text-info">
                        <small>
                            <?= $this->Html->link($bookmark->url, null, ['target' => '_blank']) ?>
                        </small>
                    </strong>
                </p>
                <p class="list-group-item-text">
                    <?= h($bookmark->description) ?>
                </p>
                <br>
                <?= $this->Html->link('Editar', ['controller' => 'bookmarks', 'action' => 'edit', $bookmark->id], ['class' => 'btn btn-sm btn-primary']) ?>
                <?= $this->Form->postLink('Eliminar', ['controller' => 'bookmarks', 'action' => 'delete', $bookmark->id], ['class' => 'btn btn-sm btn-danger', 'confirm' => '¿Estás seguro de querer borrar este enlace?']) ?>
            </li>
            <?php endforeach ?>
        </ul>
        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->first('<< ' . 'Primera') ?>
                <?= $this->Paginator->prev('< ' . 'Anterior') ?>
                <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
                <?= $this->Paginator->next('Siguiente' . ' >') ?>
                <?= $this->Paginator->last('Última' . ' >>') ?>
            </ul>
            <p><?= $this->Paginator->counter(['format' => 'Página {{page}} de {{pages}}, mostrando {{current}} registro(s) de {{count}} totales']) ?></p>
        </div>
    </div>
</div>