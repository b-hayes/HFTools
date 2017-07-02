<?php
/**
 * @var \App\View\AppView $this
 */
?>

<div class="panel panel-info"">
    <h4><?= "The observer was " . h($results['participant']['name']) ?></h4>
    <h4><?= "The participant being observed was " . h($results['participant']['observer']) ?></h4>
</div>

<div class="panel panel-info"">
    <h4><?= h($results['run']['name']) ?></h4>
    <h4><?= h($results['run']['description']) ?></h4>
    <h4><?= h($results['run']['run_date']) ?></h4>
</div>

<h4><?= h($results['questionnaire']['name']) ?></h4>
<h4><?= h($results['questionnaire']['description']) ?></h4>

<?php foreach($results['questionnaire']['sections'] as $sections): ?>
    <div class="panel panel-info">
        <div class="panel-heading">
            <strong>Section title:</strong> <?= h($sections['name']) ?>

            <!-- Added this so that if description isn't added this won't be displayed -->
            <?php if($sections['description'] != ''): ?>
                <strong>Description of section:</strong> <?= h($sections['description']) ?>
            <?php endif; ?>

        </div>
        <div class="panel-body">
            <?php foreach($sections[0]['questions'] as $questions): ?>
                <div>
                    <?= '<strong> ' . h($questions['question_text']) . ' </strong>' ?>
                    <?= h($questions['answer_text']) ?>
                    <div class="pull-right">


                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endforeach; ?>
