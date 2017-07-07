<?php
/**
  * @var \App\View\AppView $this
  */
?>

    <?= $this->Form->create($participant, [
        'url'=>[
            'controller' => 'Participants', 'action' => 'add'
        ], 'name' => 'form-add-participant'
    ]) ?>

    <fieldset>
        <legend><?= __('Add Participant') ?></legend>
        <?php
            echo $this->Form->control('first_name');
            echo $this->Form->control('last_name');
            echo $this->Form->control('email');
            echo $this->Form->control('phone');
            echo $this->Form->control('clients._ids', ['options' => $clients]);
            echo $this->Form->control('roles._ids', array(
                'type' => 'select',
                'multiple' => 'checkbox',
                'options' => $roles
            ));
        ?>

    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
