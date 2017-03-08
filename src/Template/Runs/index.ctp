<?php
/**
* @var \App\View\AppView $this
*/
?>

<h3><?= __('Runs') ?></h3>
<table cellpadding="0" cellspacing="0">
    <thead>
    <tr>
        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('day_id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('name') ?></th>
        <th scope="col"><?= $this->Paginator->sort('description') ?></th>
        <th scope="col" class="actions"><?= __('Actions') ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($runs as $run): ?>
    <tr>
        <td><?= $this->Number->format($run->id) ?></td>
        <td><?= $run->has('day') ? $this->Html->link($run->day->name, ['controller' => 'Days', 'action' => 'view',
            $run->day->id]) : '' ?>
        </td>
        <td><?= h($run->name) ?></td>
        <td><?= h($run->description) ?></td>
        <td class="actions">
            <?= $this->Html->link(__('View'), ['action' => 'view', $run->id]) ?>
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $run->id]) ?>
            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $run->id], ['confirm' => __('Are you sure you
            want to delete # {0}?', $run->id)]) ?>
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
