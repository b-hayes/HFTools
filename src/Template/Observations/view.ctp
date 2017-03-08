<?php
/**
* @var \App\View\AppView $this
*/
?>

<h3><?= h($observation->id) ?></h3>
<table class="vertical-table">
    <tr>
        <th scope="row"><?= __('Participant') ?></th>
        <td><?= $observation->has('participant') ? $this->Html->link($observation->participant->id, ['controller' =>
            'Participants', 'action' => 'view', $observation->participant->id]) : '' ?>
        </td>
    </tr>
    <tr>
        <th scope="row"><?= __('Run') ?></th>
        <td><?= $observation->has('run') ? $this->Html->link($observation->run->name, ['controller' => 'Runs', 'action'
            => 'view', $observation->run->id]) : '' ?>
        </td>
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
    <h4><?= __('Related Results') ?></h4>
    <?php if (!empty($observation->results)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th scope="col"><?= __('Id') ?></th>
            <th scope="col"><?= __('Observation Id') ?></th>
            <th scope="col"><?= __('Q Key') ?></th>
            <th scope="col"><?= __('Q Value') ?></th>
            <th scope="col"><?= __('Img') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($observation->results as $results): ?>
        <tr>
            <td><?= h($results->id) ?></td>
            <td><?= h($results->observation_id) ?></td>
            <td><?= h($results->q_key) ?></td>
            <td><?= h($results->q_value) ?></td>
            <td><?= h($results->img) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Results', 'action' => 'view', $results->id]) ?>
                <?= $this->Html->link(__('Edit'), ['controller' => 'Results', 'action' => 'edit', $results->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Results', 'action' => 'delete', $results->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $results->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php endif; ?>
</div>
