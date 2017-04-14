<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Session'), ['action' => 'edit', $session->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Session'), ['action' => 'delete', $session->id], ['confirm' => __('Are you sure you want to delete # {0}?', $session->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sessions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Session'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Days'), ['controller' => 'Days', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Day'), ['controller' => 'Days', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sessions view large-9 medium-8 columns content">
    <h3><?= h($session->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($session->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($session->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Client') ?></th>
            <td><?= $session->has('client') ? $this->Html->link($session->client->name, ['controller' => 'Clients', 'action' => 'view', $session->client->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($session->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Date') ?></th>
            <td><?= h($session->start_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End Date') ?></th>
            <td><?= h($session->end_date) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Days') ?></h4>
        <?php if (!empty($session->days)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Day Date') ?></th>
                <th scope="col"><?= __('Session Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($session->days as $days): ?>
            <tr>
                <td><?= h($days->id) ?></td>
                <td><?= h($days->name) ?></td>
                <td><?= h($days->day_date) ?></td>
                <td><?= h($days->session_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Days', 'action' => 'view', $days->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Days', 'action' => 'edit', $days->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Days', 'action' => 'delete', $days->id], ['confirm' => __('Are you sure you want to delete # {0}?', $days->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
