<div class="projetos index large-12 medium-12 columns content">
    <h3>Projetos Arquivados</h3>
    <br/>
    
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Modelos.nome','Projeto') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Clientes.nome','Cliente') ?></th>
                <th scope="col"><?= $this->Paginator->sort('observacao') ?></th>
                <th scope="col">Progresso</th>
                <th scope="col">Último concluído</th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($projetos as $projeto): ?>
            <tr>
                <td><?= $this->Number->format($projeto->id) ?></td>
                <td><?= $projeto->modelo->nome ?></td>
                <td><?= $this->Html->link($projeto->cliente->nome, ['controller' => 'Clientes', 'action' => 'view', $projeto->cliente->id]) ?></td>
                <td><?= h($projeto->observacao) ?></td>
                <td><progress value="<?= $projeto->totalConcluidos ?>" max="<?= $projeto->totalPassos ?>"></progress></td>
                <td><?= h($projeto->ultimaConcluida) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $projeto->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $projeto->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $projeto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projeto->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
