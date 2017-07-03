<?php
/**
  * @var \App\View\AppView $this
  */
?>

    <?= $this->Form->create($question, [
            'url'=>[
                    'controller' => 'Questions', 'action' => 'add'
            ]
    ]) ?>
    <fieldset>
        <legend><?= __('Add Question') ?></legend>
        <?php
            echo $this->Form->control('section_id', ['options' => $sections]);
            echo $this->Form->control('text');
//            echo $this->Form->control('answers._ids', ['options' => $answers]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
