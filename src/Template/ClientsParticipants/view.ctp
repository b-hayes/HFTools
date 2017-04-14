<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Clients Participant'), ['action' => 'edit', $clientsParticipant->client_id]) ?>
        </li>
        <li><?= $this->Form->postLink(__('Delete Clients Participant'), ['action' => 'delete',
            $clientsParticipant->client_id], ['confirm' => __('Are you sure you want to delete # {0}?',
            $clientsParticipant->client_id)]) ?>
        </li>
        <li><?= $this->Html->link(__('List Clients Participants'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Clients Participant'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Participants'), ['controller' => 'Participants', 'action' => 'index']) ?>
        </li>
        <li><?= $this->Html->link(__('New Participant'), ['controller' => 'Participants', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="clientsParticipants view large-9 medium-8 columns content">
    <h3><?= h($clientsParticipant->client_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Client') ?></th>
            <td><?= $clientsParticipant->has('client') ? $this->Html->link($clientsParticipant->client->name,
                ['controller' => 'Clients', 'action' => 'view', $clientsParticipant->client->id]) : '' ?>
            </td>
        </tr>
        <tr>
            <th scope="row"><?= __('Participant') ?></th>
            <td><?= $clientsParticipant->has('participant') ? $this->Html->link($clientsParticipant->participant->id,
                ['controller' => 'Participants', 'action' => 'view', $clientsParticipant->participant->id]) : '' ?>
            </td>
        </tr>
    </table>
</div>
