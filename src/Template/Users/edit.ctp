<?php
/**
  * @var \App\View\AppView $this
  */
?>

<?= $this->Form->create($user) ?>
<fieldset>
    <legend><?= __('Edit User') ?></legend>
    <?php
        echo $this->Form->control('username', array('readonly' => 'readonly' ));
        echo $this->Form->control('client_id', ['options' => $clients]);
        echo $this->Form->control('reset_password');
    echo $this->Form->control('confirm_password');
        echo $this->Form->control('role', ['options' => ['admin' => 'Admin', 'client' => 'Client']]);
    ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
