<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="questions form large-9 medium-8 columns content">
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
</div>
