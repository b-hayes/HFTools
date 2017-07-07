<?php
/**
  * @var \App\View\AppView $this
  */
?>
    <?= $this->Form->create($role) ?>
    <fieldset>
        <legend><?= __('Add Role') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('participants._ids', array(
                'type' => 'select',
                'multiple' => 'checkbox',
                'options' => $participants
            ));
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
