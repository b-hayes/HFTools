<?php
/**
* @var \App\View\AppView $this
*/
?>

<h3><?= h($run->name) ?></h3>
<table class="vertical-table">
    <tr>
        <th scope="row"><?= __('Day') ?></th>
        <td><?= $run->has('day') ? $this->Html->link($run->day->name, ['controller' => 'Days', 'action' => 'view',
            $run->day->id]) : '' ?>
        </td>
    </tr>
    <tr>
        <th scope="row"><?= __('Name') ?></th>
        <td><?= h($run->name) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Description') ?></th>
        <td><?= h($run->description) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Id') ?></th>
        <td><?= $this->Number->format($run->id) ?></td>
    </tr>
</table>
<div class="related">
    <h4><?= __('Related Observations') ?></h4>
    <?php if (!empty($run->observations)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th scope="col"><?= __('Id') ?></th>
            <th scope="col"><?= __('Observer Id') ?></th>
            <th scope="col"><?= __('Participant Id') ?></th>
            <th scope="col"><?= __('Run Id') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($run->observations as $observations): ?>
        <tr>
            <td><?= h($observations->id) ?></td>
            <td><?= h($observations->observer_id) ?></td>
            <td><?= h($observations->participant_id) ?></td>
            <td><?= h($observations->run_id) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Observations', 'action' => 'view',
                $observations->id]) ?>
                <?= $this->Html->link(__('Edit'), ['controller' => 'Observations', 'action' => 'edit',
                $observations->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Observations', 'action' => 'delete',
                $observations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $observations->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php endif; ?>
</div>
