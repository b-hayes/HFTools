<?php
/**
* @var \App\View\AppView $this
*/
?>

<?= $this->Form->create($user) ?>
<fieldset>
    <legend><?= __('Edit User') ?></legend>
    <?php
        echo $this->Form->input('client_id', ['options' => $clients, 'empty' => true]);
    echo $this->Form->input('username');
    echo $this->Form->input('password');
    echo $this->Form->input('role');
    ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
