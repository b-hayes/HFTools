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
        echo $this->Form->control('questionnaire_id', ['options' => $questionnaires]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>

<!-- was trying to see if I can have previews of the questionnaires but wasn't working well-->

<!--<iframe src="http://110.141.46.155/~hftools/hftools/questionnaires/view-related/120" class="preview"></iframe>-->
<div class="preview"><?php
//    echo $vars = $this->requestAction(['controller' => 'Questionnaires', 'action' => 'viewRelated'], ['id' => 120]);
?></div>