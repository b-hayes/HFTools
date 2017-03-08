<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
            __('Delete'),
            ['action' => 'delete', $day->id],
            ['confirm' => __('Are you sure you want to delete # {0}?', $day->id)]
            )
            ?>
        </li>
        <li><?= $this->Html->link(__('List Days'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sessions'), ['controller' => 'Sessions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Session'), ['controller' => 'Sessions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Runs'), ['controller' => 'Runs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Run'), ['controller' => 'Runs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="days form large-9 medium-8 columns content">
    <?= $this->Form->create($day) ?>
    <fieldset>
        <legend><?= __('Edit Day') ?></legend>
        <?php
            echo $this->Form->input('name');
        echo $this->Form->input('session_id', ['options' => $sessions]);
        echo $this->Form->input('day_date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
