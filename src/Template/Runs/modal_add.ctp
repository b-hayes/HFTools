<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div>
    <?= $this->Form->create($run, [
        'url'=>[
            'controller' => 'runs', 'action' => 'modalAdd'
        ], 'name' => 'form-add-run'
    ]) ?>
    <fieldset>
        <legend><?= __('Create new Run') ?></legend>
        <?php
        echo $this->Form->control('session_id', ['option' => $sessions]);
        echo $this->Form->control('name');
        echo $this->Form->control('description');
        ?>
    </fieldset>
    <?= $this->Form->end() ?>
</div>
