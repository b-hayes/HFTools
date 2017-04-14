<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Day'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sessions'), ['controller' => 'Sessions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Session'), ['controller' => 'Sessions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Runs'), ['controller' => 'Runs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Run'), ['controller' => 'Runs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="days index large-9 medium-8 columns content">
    <h3><?= __('Days') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('name') ?></th>
            <th scope="col"><?= $this->Paginator->sort('session_id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('day_date') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($days as $day): ?>
        <tr>
            <td><?= $this->Number->format($day->id) ?></td>
            <td><?= h($day->name) ?></td>
            <td><?= $day->has('session') ? $this->Html->link($day->session->name, ['controller' => 'Sessions', 'action'
                => 'view', $day->session->id]) : '' ?>
            </td>
            <td><?= h($day->day_date) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $day->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $day->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $day->id], ['confirm' => __('Are you sure you want to delete # {0}?', $day->id)]) ?>
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
