<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Session[]|\Cake\Collection\CollectionInterface $sessions
  */
?>
    <h3><?= __('Sessions') ?></h3>
    <table class="wide-table" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('end_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('client_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sessions as $session): ?>
            <tr>
                <td><?= h($session->name) ?></td>
                <td><?= h($session->description) ?></td>
                <td><?= h($session->start_date->nice()) ?></td>
                <td><?= h($session->end_date->nice()) ?></td>
                <td><?= $session->has('client') ? $this->Html->link($session->client->name, ['controller' => 'Clients', 'action' => 'view', $session->client->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-info-sign"></span>'), ['action' => 'view', $session->id],
                        ['escapeTitle' => false , 'title' => 'View Details']) ?>
                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-pencil"></span>'), ['action' => 'edit', $session->id],
                        ['escapeTitle' => false , 'title' => 'Edit Details']) ?>
                    <?= $this->Form->postLink(__('<span class="glyphicon glyphicon-trash"></span>'), ['action' => 'delete', $session->id],
                        ['confirm' => __('Are you sure you want to delete this session?'), 'escapeTitle' => false , 'title' => 'Delete']) ?>
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
