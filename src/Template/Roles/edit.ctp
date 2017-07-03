<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div>
    <?= $this->Form->create($role) ?>
    <fieldset>
        <legend><?= __('Edit Role') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('participants._ids', ['options' => $participants]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
