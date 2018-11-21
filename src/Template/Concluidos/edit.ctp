<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Concluido $concluido
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $concluido->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $concluido->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Concluidos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Projetos'), ['controller' => 'Projetos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Projeto'), ['controller' => 'Projetos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Passos'), ['controller' => 'Passos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Passo'), ['controller' => 'Passos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="concluidos form large-9 medium-8 columns content">
    <?= $this->Form->create($concluido) ?>
    <fieldset>
        <legend><?= __('Edit Concluido') ?></legend>
        <?php
            echo $this->Form->control('data');
            echo $this->Form->control('projeto_id', ['options' => $projetos]);
            echo $this->Form->control('passo_id', ['options' => $passos]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
