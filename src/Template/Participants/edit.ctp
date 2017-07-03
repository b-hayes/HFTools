<?php
/**
  * @var \App\View\AppView $this
  */
?>
    <?= $this->Form->create($participant) ?>
    <fieldset>
        <legend><?= __('Edit Participant') ?></legend>
        <?php
            echo $this->Form->control('first_name');
            echo $this->Form->control('last_name');
            echo $this->Form->control('email');
            echo $this->Form->control('phone');
            echo $this->Form->control('clients._ids', ['options' => $clients]);
            echo $this->Form->control('roles._ids', ['options' => $roles]);
            echo $this->Form->control('sessions._ids', ['options' => $sessions]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
