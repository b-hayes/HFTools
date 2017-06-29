<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
  */
?>

<h3><?= __('Users') ?></h3>
<table class="wide-table" cellpadding="0" cellspacing="0">
    <thead>
    <tr>
        <th scope="col"><?= $this->Paginator->sort('username') ?></th>
        <th scope="col"><?= $this->Paginator->sort('client_id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('role') ?></th>
        <th scope="col"><?= $this->Paginator->sort('created') ?></th>
        <th scope="col"><?= $this->Paginator->sort('last_login') ?></th>
        <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
        <th scope="col" class="actions"><?= __('Actions') ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= h($user->username) ?></td>
            <td><?= $user->has('client') ? $this->Html->link($user->client->name, ['controller' => 'Clients', 'action' => 'view', $user->client->id]) : '' ?></td>
            <td><?= h($user->role) ?></td>
            <td><?= h($user->created) ?></td>
            <td><?= h($user->last_login) ?></td>
            <td><?= h($user->modified) ?></td>
            <td class="actions">

                <a href="/~hftools/hftools/users/view/<?= $user->id ?>" title="View Details"><span class="glyphicon glyphicon-info-sign"></span></a>
                <a href="/~hftools/hftools/users/edit/<?= $user->id ?>" title="Edit Details"><span class="glyphicon glyphicon-pencil"></span></a>
                <?php //echo $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                <?php //echo $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                <?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-trash"></span>'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'escapeTitle' => false]) ?>
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
