<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Participants Role'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Participants'), ['controller' => 'Participants', 'action' => 'index']) ?>
        </li>
        <li><?= $this->Html->link(__('New Participant'), ['controller' => 'Participants', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="participantsRoles index large-9 medium-8 columns content">
    <h3><?= __('Participants Roles') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('participant_id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('role_id') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($participantsRoles as $participantsRole): ?>
        <tr>
            <td><?= $participantsRole->has('participant') ? $this->Html->link($participantsRole->participant->id,
                ['controller' => 'Participants', 'action' => 'view', $participantsRole->participant->id]) : '' ?>
            </td>
            <td><?= $participantsRole->has('role') ? $this->Html->link($participantsRole->role->name, ['controller' =>
                'Roles', 'action' => 'view', $participantsRole->role->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $participantsRole->participant_id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $participantsRole->participant_id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $participantsRole->participant_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $participantsRole->participant_id)]) ?>
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
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out
            of {{count}} total')]) ?></p>
    </div>
</div>
