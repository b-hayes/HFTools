<?php
/**
  * @var \App\View\AppView $this
  */
?>
    <?= $this->Form->create($observation) ?>
    <fieldset>
        <legend><?= __('Edit Observation') ?></legend>
        <?php
            echo $this->Form->control('observer_id');
            echo $this->Form->control('participant_id', ['options' => $participants]);
            echo $this->Form->control('run_id', ['options' => $runs]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
