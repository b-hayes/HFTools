<?php
/**
 * @var \App\View\AppView $this
 * // todo flagged for delete
 */
?>

<div class="panel panel-info"">
    <h4><?= "The observer was " . h($results['participant']['name']) ?></h4>
    <h4><?= "The participant being observed was " . h($results['participant']['observer']) ?></h4>
</div>

<div class="panel panel-info">
    <div class="panel-heading">Run Details</div>
    <div class="panel-body">
        <strong>Name:</strong> <?= h($results['run']['name']) ?><br>
        <strong>Description:</strong><?= h($results['run']['description']) ?><br>
        <strong>Date:</strong> <?= h($results['run']['run_date']) ?>
    </div>
</div>





<h4><?= h($results['questionnaire']['name']) ?></h4>
<h4><?= h($results['questionnaire']['description']) ?></h4>


<?php foreach($results['questionnaire']['sections'] as $sections): ?>
    <div class="section">
            <strong>Section title:</strong> <?= h($sections['name']) ?>

            <!-- Added this so that if description isn't added this won't be displayed -->
            <?php if($sections['description'] != ''): ?>
                <strong>Description of section:</strong> <?= h($sections['description']) ?>
            <?php endif; ?>

            <table class="wide-table" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    <th>Question</th>
                    <th>Answer</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($sections[0]['questions'] as $questions): ?>
                    <tr>
                        <td><?=  h($questions['question_text']) ?></td>
                        <td><?= h($questions['answer_text']) ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

    </div>
<?php endforeach; ?>


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
            <table class="wide-table" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    <th>Question</th>
                    <th>Answer</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach($sections[0]['questions'] as $questions): ?>
                        <tr>
                            <td><?=  h($questions['question_text']) ?></td>
                            <td><?= h($questions['answer_text']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
<?php endforeach; ?>
