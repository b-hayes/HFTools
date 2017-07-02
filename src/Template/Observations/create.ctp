<?php
/**
 * @var \App\View\AppView $this
 */
?>
    <?= $this->Form->create($observation) ?>
    <fieldset>
        <legend><?= __('Add Observation') ?></legend>
        <?php
        echo $this->Form->control('observer_id', ['options' => $participants]);
        //        echo $this->Form->control('participant_id', ['options' => $participants]);

        echo $this->Form->control('participant._id', array(
            'label' => 'participants',
            'type' => 'select',
            'multiple' => 'checkbox',
            'options' => $participants,
            'value' => $participants
        ));

        echo $this->Form->control('run_id', ['options' => $runs]);
        echo $this->Form->control('questionnaire_id', ['options' => $questionnaires, 'label' => 'Select tool']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
