<?php
/**
  * @var \App\View\AppView $this
  */
?>


<?= $this->Form->create($participant, [
'url' => [
'controller' => 'Participants', 'action' => 'add'
]
]) ?>
<fieldset>
    <legend><?= __('Add Participant') ?></legend>
    <?php
        echo $this->Form->input('first_name');
    echo $this->Form->input('last_name');
    echo $this->Form->input('email');
    echo $this->Form->input('phone');
    echo $this->Form->input('clients._ids', ['options' => $clients]);
    echo $this->Form->input('roles._ids', ['options' => $roles]);
    ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
