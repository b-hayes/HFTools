<?php
/**
  * @var \App\View\AppView $this
  */
?>

<?= $this->Form->create($user) ?>
<fieldset>
    <legend><?= __('Edit User') ?></legend>
    <?php
        echo $this->Form->control('username');
        echo $this->Form->control('client_id', ['options' => $clients]);
        echo $this->Form->control('password');
        echo $this->Form->control('role');
        echo $this->Form->control('last_login', ['empty' => true]);
    ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
