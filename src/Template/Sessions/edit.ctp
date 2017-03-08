<?php
/**
* @var \App\View\AppView $this
*/
?>

<?= $this->Form->create($session) ?>
<fieldset>
    <legend><?= __('Edit Session') ?></legend>
    <?php
        echo $this->Form->input('name');
    echo $this->Form->input('description');
    echo $this->Form->input('start_date');
    echo $this->Form->input('end_date', ['empty' => true]);
    echo $this->Form->input('client_id', ['options' => $clients]);
    ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
