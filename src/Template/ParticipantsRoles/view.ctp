<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Participants Role'), ['action' => 'edit', $participantsRole->participant_id])
            ?>
        </li>
        <li><?= $this->Form->postLink(__('Delete Participants Role'), ['action' => 'delete',
            $participantsRole->participant_id], ['confirm' => __('Are you sure you want to delete # {0}?',
            $participantsRole->participant_id)]) ?>
        </li>
        <li><?= $this->Html->link(__('List Participants Roles'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Participants Role'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Participants'), ['controller' => 'Participants', 'action' => 'index']) ?>
        </li>
        <li><?= $this->Html->link(__('New Participant'), ['controller' => 'Participants', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="participantsRoles view large-9 medium-8 columns content">
    <h3><?= h($participantsRole->participant_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Participant') ?></th>
            <td><?= $participantsRole->has('participant') ? $this->Html->link($participantsRole->participant->id,
                ['controller' => 'Participants', 'action' => 'view', $participantsRole->participant->id]) : '' ?>
            </td>
        </tr>
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= $participantsRole->has('role') ? $this->Html->link($participantsRole->role->name, ['controller' =>
                'Roles', 'action' => 'view', $participantsRole->role->id]) : '' ?>
            </td>
        </tr>
    </table>
</div>
