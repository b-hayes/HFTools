<?php
/**
 * @var \App\View\AppView $this
 */
?>

<?= $this->Form->create($observation) ?>
<fieldset>
    <legend><?= __('Edit Observation') ?></legend>
    <?php
    echo $this->Form->input('observer_id');
    echo $this->Form->input('participant_id', ['options' => $participants]);
    echo $this->Form->input('run_id', ['options' => $runs]);
    ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
