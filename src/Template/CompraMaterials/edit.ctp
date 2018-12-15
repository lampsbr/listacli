<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CompraMaterial $compraMaterial
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $compraMaterial->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $compraMaterial->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Compra Materials'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Materials'), ['controller' => 'Materials', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Material'), ['controller' => 'Materials', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="compraMaterials form large-9 medium-8 columns content">
    <?= $this->Form->create($compraMaterial) ?>
    <fieldset>
        <legend><?= __('Edit Compra Material') ?></legend>
        <?php
            echo $this->Form->control('deleted', ['empty' => true]);
            echo $this->Form->control('data_compra');
            echo $this->Form->control('data_chegada', ['empty' => true]);
            echo $this->Form->control('observacao');
            echo $this->Form->control('preco');
            echo $this->Form->control('material_id', ['options' => $materials]);
            echo $this->Form->control('quantidade');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
