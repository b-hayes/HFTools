<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Run[]|\Cake\Collection\CollectionInterface $runs
  */
?>
<div>
    <h3><?= __('Runs') ?></h3>
    <table class="wide-table" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('session_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('run_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($runs as $run): ?>
            <tr>
                <td><?= $run->has('session') ? $this->Html->link($run->session->name, ['controller' => 'Sessions', 'action' => 'view', $run->session->id]) : '' ?></td>
                <td><?= h($run->run_date) ?></td>
                <td><?= h($run->name) ?></td>
                <td><?= h($run->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-info-sign"></span>'), ['action' => 'view', $run->id]) ?>
                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-pencil"></span>'), ['action' => 'edit', $run->id]) ?>
                    <?= $this->Form->postLink(__('<span class="glyphicon glyphicon-trash"></span>'), ['action' => 'delete', $run->id], ['confirm' => __('Are you sure you want to delete # {0}?', $run->id)]) ?>
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
</div>
