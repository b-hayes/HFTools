<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Observation $observation
  */
?>
    <h3><?= h($observation->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Participant') ?></th>
            <td><?= $observation->has('participant') ? $this->Html->link($observation->participant->id, ['controller' => 'Participants', 'action' => 'view', $observation->participant->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Run') ?></th>
            <td><?= $observation->has('run') ? $this->Html->link($observation->run->name, ['controller' => 'Runs', 'action' => 'view', $observation->run->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($observation->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Observer Id') ?></th>
            <td><?= $this->Number->format($observation->observer_id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Answers') ?></h4>
        <?php if (!empty($observation->answers)): ?>
        <table class="wide-table" cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Observation Id') ?></th>
                <th scope="col"><?= __('Question Id') ?></th>
                <th scope="col"><?= __('Answer Text') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($observation->answers as $answers): ?>
            <tr>
                <td><?= h($answers->id) ?></td>
                <td><?= h($answers->observation_id) ?></td>
                <td><?= h($answers->question_id) ?></td>
                <td><?= h($answers->answer_text) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-info-sign"></span>'), ['controller' => 'Answers', 'action' => 'view', $answers->id],
                        ['escapeTitle' => false , 'title' => 'View Details']) ?>
                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-pencil"></span>'), ['controller' => 'Answers', 'action' => 'edit', $answers->id],
                        ['escapeTitle' => false , 'title' => 'Edit Details']) ?>
                    <?= $this->Form->postLink(__('<span class="glyphicon glyphicon-trash"></span>'), ['controller' => 'Answers', 'action' => 'delete', $answers->id],
                        ['confirm' => __('Are you sure you want to delete # {0}?', $answers->id), 'escapeTitle' => false , 'title' => 'Delete']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
