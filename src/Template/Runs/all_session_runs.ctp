<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Questionnaire $questionnaire
 */
?>

<?php debug($run) ?>

<!-- this is the run information -->
<h4><?= h($run->name) ?></h4>
<h4><?= h($run->description) ?></h4>

<?php foreach($run->observations as $observation): ?>

<div class="panel panel-info">
    <div class="panel-heading">

        <!-- runs inside the sessions -->
        <?= h($observation->observer_id) ?>
        <?= h($observation->participant_id) ?>
        <?= h($observation->run_id) ?>

    </div>
    <div class="panel-body">
        <?php /* foreach($sections->questions as $questions): */?>
        <div>
            <?php /* h($questions->text) */ ?>
            <?php /* endforeach; */?>
        </div>
    </div>
    <?php endforeach; ?>
