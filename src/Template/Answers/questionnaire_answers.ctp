<?php
/**
 * @var \App\View\AppView $this
 */

$iterator = 0;  // used as an array index for when  all the questions and answers are sent via 'post'

?>

<div class="answers form large-9 medium-8 columns content">
    <h3><?= h($questionnaire->name) ?></h3>
    <h4><?= h($questionnaire->description) ?></h4>

    <div class="panel panel-default">
        <div class="panel-heading">
            Information
        </div>
        <div class="panel-body">
            <strong>Observer: </strong><?= h($observer->full_name) ?><BR>
            <strong>Current participant: </strong><?= h($participant->full_name) ?><BR>
            <strong>There are: </strong><?= h($count) ?> observations remaining in this run.<BR>
        </div>
    </div>

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
                    <?php foreach($sections->questions as $questions): ?>
                        <?= h($questions->text) ?>
                        <hr>
                        <?= $this->Form->control('answers.' . $iterator . '.question_id', ['type' => 'hidden', 'value' => $questions->id]) ?>

                        <?php if( !empty($sections->buttontype) && strcmp($sections->buttontype->type, 'radioButton') == 0): ?>
                            <?php foreach($sections->buttontype->buttonvalues as $values): ?>
                                <input type="radio" id="answers-<?= $iterator ?>-answer" name="<?= 'answers[' . $iterator . '][answer_text]' ?>" value="<?= $values->text_value ?>"><?= $values->text_lable ?>

                            <?php endforeach ?>
                            <hr>

                        <?php else: ?>
                            <?php  ?>
                                <?= $this->Form->control('answers.' . $iterator . '.answer', ['label' => false]) ?>
                        <?php endif; ?>

                       <?php $iterator++; ?>
                    <?php endforeach; ?>


                </div>
            </div>
        <?php endforeach; ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>