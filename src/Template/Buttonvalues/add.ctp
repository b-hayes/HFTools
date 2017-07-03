<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Buttonvalues'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Buttontypes'), ['controller' => 'Buttontypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Buttontype'), ['controller' => 'Buttontypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="buttonvalues form large-9 medium-8 columns content">
    <?= $this->Form->create($buttonvalue) ?>
    <fieldset>
        <legend><?= __('Add Buttonvalue') ?></legend>
        <?php
            echo $this->Form->control('text_lable');
            echo $this->Form->control('text_value');
            echo $this->Form->control('buttontypes._ids', ['options' => $buttontypes]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
