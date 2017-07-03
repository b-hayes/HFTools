<?php
/**
  * @var \App\View\AppView $this
  */
?>
    <?= $this->Form->create($questionnaire) ?>
    <fieldset>
        <legend><?= __('Add Questionnaire') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
