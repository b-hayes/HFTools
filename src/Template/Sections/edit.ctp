<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div>
    <?= $this->Form->create($section) ?>
    <fieldset>
        <legend><?= __('Edit Section') ?></legend>
        <?php
            echo $this->Form->control('questionnaire_id', ['options' => $questionnaires]);
            echo $this->Form->control('name');
            echo $this->Form->control('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
