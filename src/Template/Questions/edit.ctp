<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="alert alert-dismissible alert-warning">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <h4>Warning: You should only edit questions for minor corrections.</h4>
    <p>This question may have been answered during an Observation already and changing the questions meaning/purpose will invalidate the answer data stored.</p>
</div>
    <?= $this->Form->create($question) ?>
    <fieldset>
        <legend><?= __('Edit Question') ?></legend>
        <?php
            echo $this->Form->control('section_id', ['options' => $sections]);
            echo $this->Form->control('text');
            echo $this->Form->control('answers._ids', ['options' => $answers]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
