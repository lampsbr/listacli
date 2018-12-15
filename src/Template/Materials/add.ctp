<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Material $material
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Materials'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Compra Materials'), ['controller' => 'CompraMaterials', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Compra Material'), ['controller' => 'CompraMaterials', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Material Clientes'), ['controller' => 'MaterialClientes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Material Cliente'), ['controller' => 'MaterialClientes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="materials form large-9 medium-8 columns content">
    <?= $this->Form->create($material) ?>
    <fieldset>
        <legend><?= __('Add Material') ?></legend>
        <?php
            echo $this->Form->control('nome');
            echo $this->Form->control('descricao');
            echo $this->Form->control('saldo_atual');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
