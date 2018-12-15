<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CompraMaterial $compraMaterial
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Compra Materials'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Materials'), ['controller' => 'Materials', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Material'), ['controller' => 'Materials', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="compraMaterials form large-9 medium-8 columns content">
    <?= $this->Form->create($compraMaterial) ?>
    <fieldset>
        <legend>
            Cadastrar compra para 
            <?= $compraMaterial->has('material') ? $this->Html->link($compraMaterial->material->nome, ['controller' => 'Materials', 'action' => 'view', $compraMaterial->material->id]) : '';?>
        </legend>
        <?php
            echo $this->Form->control('data_compra');
            echo $this->Form->control('observacao');
            echo $this->Form->control('preco');            
            echo $this->Form->hidden('material_id');
            echo $this->Form->control('quantidade');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
