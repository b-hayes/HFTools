<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="buttonvalues form large-9 medium-8 columns content">
    <?= $this->Form->create($buttonvalue) ?>
    <fieldset>
        <legend><?= __('Edit Buttonvalue') ?></legend>
        <?php
            echo $this->Form->control('text_lable');
            echo $this->Form->control('text_value');
            echo $this->Form->control('buttontypes._ids', ['options' => $buttontypes]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
