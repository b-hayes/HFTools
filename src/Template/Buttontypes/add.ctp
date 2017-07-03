<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="buttontypes form large-9 medium-8 columns content">
    <?= $this->Form->create($buttontype) ?>
    <fieldset>
        <legend><?= __('Add Buttontype') ?></legend>
        <?php
            echo $this->Form->control('text');
            echo $this->Form->control('type', ['options' => ['radioButton' => 'Radio Buttons', 'textArea' => 'Text area']]);
            echo $this->Form->control('buttonvalues._ids', ['options' => $buttonvalues]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
