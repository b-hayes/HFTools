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
                ['action' => 'delete', $buttontype->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $buttontype->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Buttontypes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Buttonvalues'), ['controller' => 'Buttonvalues', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Buttonvalue'), ['controller' => 'Buttonvalues', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="buttontypes form large-9 medium-8 columns content">
    <?= $this->Form->create($buttontype) ?>
    <fieldset>
        <legend><?= __('Edit Buttontype') ?></legend>
        <?php
            echo $this->Form->control('text');
            echo $this->Form->control('buttonvalues._ids', ['options' => $buttonvalues]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
