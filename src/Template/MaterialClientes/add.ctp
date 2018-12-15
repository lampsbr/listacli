<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MaterialCliente $materialCliente
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Material Clientes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Materials'), ['controller' => 'Materials', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Material'), ['controller' => 'Materials', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="materialClientes form large-9 medium-8 columns content">
    <?= $this->Form->create($materialCliente) ?>
    <fieldset>
        <legend>
            Reservar
            <?= $materialCliente->has('material') ? $this->Html->link($materialCliente->material->nome, ['controller' => 'Materials', 'action' => 'view', $materialCliente->material->id]) : '';?>
        </legend>
        <?php
            echo $this->Form->control('cliente_id', ['options' => $clientes]);
            echo $this->Form->hidden('material_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
