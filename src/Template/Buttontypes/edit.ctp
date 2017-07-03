<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="buttontypes form large-9 medium-8 columns content">
    <?= $this->Form->create($buttontype) ?>
    <fieldset>
        <legend><?= __('Edit Buttontype') ?></legend>
        <?php
            echo $this->Form->control('text');
            echo $this->Form->control('type');
            echo $this->Form->control('buttonvalues._ids', ['options' => $buttonvalues]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
