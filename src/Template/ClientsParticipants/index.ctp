<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Clients Participant'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Participants'), ['controller' => 'Participants', 'action' => 'index']) ?>
        </li>
        <li><?= $this->Html->link(__('New Participant'), ['controller' => 'Participants', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="clientsParticipants index large-9 medium-8 columns content">
    <h3><?= __('Clients Participants') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <th scope="col"><?= $this->Paginator->sort('client_id') ?></th>
            <th scope="col"><?= $this->Paginator->sort('participant_id') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($clientsParticipants as $clientsParticipant): ?>
        <tr>
            <td><?= $clientsParticipant->has('client') ? $this->Html->link($clientsParticipant->client->name,
                ['controller' => 'Clients', 'action' => 'view', $clientsParticipant->client->id]) : '' ?>
            </td>
            <td><?= $clientsParticipant->has('participant') ? $this->Html->link($clientsParticipant->participant->id,
                ['controller' => 'Participants', 'action' => 'view', $clientsParticipant->participant->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $clientsParticipant->client_id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $clientsParticipant->client_id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $clientsParticipant->client_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $clientsParticipant->client_id)]) ?>
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
