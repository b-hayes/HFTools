<?php
/**
  * @var \App\View\AppView $this
  */
?>
    <?= $this->Form->create($section) ?>
    <fieldset>
        <legend><?= __('Add Section') ?></legend>
        <?php
            echo $this->Form->control('questionnaire_id', ['options' => $questionnaires]);
            echo $this->Form->control('name');
            echo $this->Form->control('description');
            echo $this->Form->control('buttontype_id', ['options' => $buttontypes]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
