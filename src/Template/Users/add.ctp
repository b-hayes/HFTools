<?php
/**
  * @var \App\View\AppView $this
  */
?>

<?= $this->Form->create($user) ?>
<fieldset>
    <legend><?= __('Create user account') ?></legend>
    <?php
        echo $this->Form->control('username');
        echo $this->Form->control('client_id', ['options' => $clients]);
        echo $this->Form->control('password');
        echo $this->Form->control('re_password', ['type' => 'password', 'label' => 'Re-enter password']);
        echo $this->Form->control('role', ['options' => ['admin' => 'Admin', 'client' => 'Client']]);
        //echo $this->Form->control('last_login', ['empty' => true]);
    ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
