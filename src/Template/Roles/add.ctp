<?php
/**
* @var \App\View\AppView $this
*/
?>

<?= $this->Form->create($role) ?>
<fieldset>
    <legend><?= __('Add Role') ?></legend>
    <?php
        echo $this->Form->input('name');
    echo $this->Form->input('participants._ids', ['options' => $participants]);
    ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
