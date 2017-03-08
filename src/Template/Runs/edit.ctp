<?php
/**
* @var \App\View\AppView $this
*/
?>

<?= $this->Form->create($run) ?>
<fieldset>
    <legend><?= __('Edit Run') ?></legend>
    <?php
        echo $this->Form->input('day_id', ['options' => $days]);
    echo $this->Form->input('name');
    echo $this->Form->input('description');
    ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
