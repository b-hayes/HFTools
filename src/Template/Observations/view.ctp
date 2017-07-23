<?php
/**
 * @var \App\View\AppView $this
 */
?>

<div class="page-break">
    <div class="row">
        <table style="width: 100%">
            <tr>
                <td>
                    <div class="">
                        <h2>Observation Results</h2>
                        <h4><?php echo "<strong>Observer: </strong>" . h($results['participant']['name']) ?></h4>
                        <h4><?php echo "<strong>Participant: </strong>" . h($results['participant']['observer']) ?></h4>
                    </div>
                </td>
                <td>
                    <div class="">
                        <div class="panel panel-info">
                            <div class="panel-heading">Run Details</div>
                            <div class="panel-body">
                                <strong>Name: </strong><?php echo h($results['run']['name']) ?><br>
                                <strong>Description: </strong><?php echo h($results['run']['description']) ?><br>
                                <strong>Date: </strong><?php echo h($results['run']['run_date']->nice()) ?>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <div class="panel panel-info">
        <div class="panel-heading">
            <h4>Tool: <?= h($results['questionnaire']['name']) ?></h4>
        </div>
        <div class="panel-body">
            <h4><?= h($results['questionnaire']['description']) ?></h4><br>
            <?php foreach ($results['questionnaire']['sections'] as $sections): ?>

                <table class="no-break" style="width: 100%" cellpadding="0" cellspacing="0">
                    <thead>
                    <tr>
                        <th colspan="2"><strong>Section title:</strong> <?= h($sections['name']) ?></th>
                    </tr>
                    <!-- Added this so that if description isn't added this won't be displayed -->
                    <?php if($sections['description'] != ''): ?>
                        <th colspan="2">
                            <strong>Description of section:</strong> <?= h($sections['description']) ?>
                        </th>
                    <?php endif; ?>
                    </thead>
                    <tbody>
                    <?php foreach ($sections[0]['questions'] as $questions): ?>
                        <tr>
                            <td><?= h($questions['question_text']) ?></td>
                            <td><?= h($questions['answer_text']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endforeach; ?>
        </div>
    </div>
</div>


