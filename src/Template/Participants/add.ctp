<?php
/**
  * @var \App\View\AppView $this
  */
?>

    <?= $this->Form->create($participant, [
        'url'=>[
            'controller' => 'Participants', 'action' => 'add'
        ], 'name' => 'form-add-participant'
    ]) ?>

    <fieldset>
        <legend><?= __('Create New Participant') ?></legend>
        <?php
            echo $this->Form->control('first_name');
            echo $this->Form->control('last_name');
            echo $this->Form->control('email');
            echo $this->Form->control('phone');
            echo $this->Form->control('clients._ids', ['options' => $clients]);
        ?>

        <?php if ($roles->isEmpty()): ?>
        <p>There does not appear to be any roles available <?= $this->Html->link(__('click here to create one'), ['controller' => 'roles', 'action' => 'add']) ?> </p>
        <?php else: ?>
            <?= $this->Form->control('roles._ids', array(
                'type' => 'select',
                'multiple' => 'checkbox',
                'options' => $roles
            )); ?>
        <?php endif ?>

    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
