<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Observation[]|\Cake\Collection\CollectionInterface $observations
  */
?>
    <h3><?= __('Observations') ?></h3>
    <table class="wide-table" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('observer_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('participant_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('run_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($observations as $observation): ?>
            <tr>
                <td><?= $observation->has('observer_id') ? $this->Html->link($observation->observer->full_name, ['controller' => 'Participants', 'action' => 'view', $observation->observer_id]) : '' ?></td>
                <td><?= $observation->has('participant') ? $this->Html->link($observation->participant->full_name, ['controller' => 'Participants', 'action' => 'view', $observation->participant->id]) : '' ?></td>
                <td><?= $observation->has('run') ? $this->Html->link($observation->run->name, ['controller' => 'Runs', 'action' => 'view', $observation->run->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-info-sign"></span>'), ['action' => 'view', $observation->id],
                        ['escapeTitle' => false , 'title' => 'View Details']) ?>
                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-pencil"></span>'), ['action' => 'edit', $observation->id],
                        ['escapeTitle' => false , 'title' => 'Edit Details']) ?>
                    <?= $this->Form->postLink(__('<span class="glyphicon glyphicon-trash"></span>'), ['action' => 'delete', $observation->id],
                        ['confirm' => __('Are you sure you want to delete this observation?'), 'escapeTitle' => false , 'title' => 'Delete']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
