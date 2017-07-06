<?php
/**
 * @var \App\View\AppView $this
 */
?>
<?= $this->Form->create($participant, [
    'url'=>[
        'controller' => 'Participants', 'action' => 'modalAdd'
    ], 'name' => 'form-add-participant'
]) ?>
<fieldset>
    <legend><?= __('Add Participant') ?></legend>
    <?php
    echo $this->Form->control('first_name');
    echo $this->Form->control('last_name');
    echo $this->Form->control('email');
    echo $this->Form->control('phone');
    echo $this->Form->control('clients._ids', ['options' => $clients]);
    echo $this->Form->control('roles._ids', ['options' => $roles]);

    ?>
</fieldset>
<?php //echo $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
