<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Day'), ['action' => 'edit', $day->id]) ?></li>
        <li><?= $this->Form->postLink(__('Delete Day'), ['action' => 'delete', $day->id], ['confirm' => __('Are you sure you want to delete # {0}?', $day->id)]) ?>
        </li>
        <li><?= $this->Html->link(__('List Days'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Day'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sessions'), ['controller' => 'Sessions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Session'), ['controller' => 'Sessions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Runs'), ['controller' => 'Runs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Run'), ['controller' => 'Runs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="days view large-9 medium-8 columns content">
    <h3><?= h($day->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($day->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Session') ?></th>
            <td><?= $day->has('session') ? $this->Html->link($day->session->name, ['controller' => 'Sessions', 'action' => 'view', $day->session->id]) : '' ?>
            </td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($day->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Day Date') ?></th>
            <td><?= h($day->day_date) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Runs') ?></h4>
        <?php if (!empty($day->runs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Day Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($day->runs as $runs): ?>
            <tr>
                <td><?= h($runs->id) ?></td>
                <td><?= h($runs->day_id) ?></td>
                <td><?= h($runs->name) ?></td>
                <td><?= h($runs->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Runs', 'action' => 'view', $runs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Runs', 'action' => 'edit', $runs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Runs', 'action' => 'delete', $runs->id],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $runs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
