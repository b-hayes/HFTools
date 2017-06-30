<?php
/**
 * @var \App\View\AppView $this
 */

$iterator = 0;  // used as an array index for when  all the questions and answers are sent via 'post'

?>

<div class="answers form large-9 medium-8 columns content">
    <h3><?= h($questionnaire->name) ?></h3>
    <h4><?= h($questionnaire->description) ?></h4>
    <h4><?= h($observer->full_name) ?></h4>
    <?= $this->Form->create('answers') ?>
    <fieldset>
        <?php foreach($questionnaire->sections as $sections): ?>
            <div class="panel panel-info">
                <div class="panel-heading">
                    <strong>Section title:</strong> <?= h($sections->name) ?>
                    <BR />
                    <?php if($sections->description != ''): ?>
                        <strong>Description of section:</strong> <?= h($sections->description) ?>
                    <?php endif; ?>
                </div>
                <div class="panel-body">
                    <?php

                    foreach($sections->questions as $questions) {

                        // display the questions to the user
                        echo h($questions->text);

                        // this field is hidden, because this needs to  be part of the 'post' request to save question id, sadly labels are not included in post requests.
                        echo $this->Form->control('answers.' . $iterator . '.question_id', ['type' => 'hidden', 'value' => $questions->id]);

                        // user input field
                        echo $this->Form->control('answers.' . $iterator . '.answer_text', ['label' => false]);

                        $iterator++;
                    }
                    ?>
                </div>
            </div>
        <?php endforeach; ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>