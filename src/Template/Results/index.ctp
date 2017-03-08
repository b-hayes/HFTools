<?php
/**
* @var \App\View\AppView $this
*/
?>

<h3><?= __('Results') ?></h3>
<table cellpadding="0" cellspacing="0">
    <thead>
    <tr>
        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('observation_id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('q_key') ?></th>
        <th scope="col"><?= $this->Paginator->sort('q_value') ?></th>
        <th scope="col"><?= $this->Paginator->sort('img') ?></th>
        <th scope="col" class="actions"><?= __('Actions') ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($results as $result): ?>
    <tr>
        <td><?= $this->Number->format($result->id) ?></td>
        <td><?= $result->has('observation') ? $this->Html->link($result->observation->id, ['controller' =>
            'Observations', 'action' => 'view', $result->observation->id]) : '' ?>
        </td>
        <td><?= h($result->q_key) ?></td>
        <td><?= h($result->q_value) ?></td>
        <td><?= h($result->img) ?></td>
        <td class="actions">
            <?= $this->Html->link(__('View'), ['action' => 'view', $result->id]) ?>
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $result->id]) ?>
            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $result->id], ['confirm' => __('Are you sure
            you want to delete # {0}?', $result->id)]) ?>
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
    <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of
        {{count}} total')]) ?></p>
</div>
