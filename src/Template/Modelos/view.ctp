<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Modelo $modelo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Modelo'), ['action' => 'edit', $modelo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Modelo'), ['action' => 'delete', $modelo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $modelo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Modelos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Modelo'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Passos'), ['controller' => 'Passos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Passo'), ['controller' => 'Passos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projetos'), ['controller' => 'Projetos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Projeto'), ['controller' => 'Projetos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="modelos view large-9 medium-8 columns content">
    <h3><?= h($modelo->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($modelo->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($modelo->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Passos') ?></h4>
        <?php if (!empty($modelo->passos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Idpassos') ?></th>
                <th scope="col"><?= __('Nome') ?></th>
                <th scope="col"><?= __('Modelo Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($modelo->passos as $passos): ?>
            <tr>
                <td><?= h($passos->idpassos) ?></td>
                <td><?= h($passos->nome) ?></td>
                <td><?= h($passos->modelo_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Passos', 'action' => 'view', $passos->idpassos]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Passos', 'action' => 'edit', $passos->idpassos]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Passos', 'action' => 'delete', $passos->idpassos], ['confirm' => __('Are you sure you want to delete # {0}?', $passos->idpassos)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Projetos') ?></h4>
        <?php if (!empty($modelo->projetos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Observacao') ?></th>
                <th scope="col"><?= __('Modelo Id') ?></th>
                <th scope="col"><?= __('Cliente Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($modelo->projetos as $projetos): ?>
            <tr>
                <td><?= h($projetos->id) ?></td>
                <td><?= h($projetos->observacao) ?></td>
                <td><?= h($projetos->modelo_id) ?></td>
                <td><?= h($projetos->cliente_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Projetos', 'action' => 'view', $projetos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Projetos', 'action' => 'edit', $projetos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Projetos', 'action' => 'delete', $projetos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projetos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
