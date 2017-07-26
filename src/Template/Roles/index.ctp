<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Role[]|\Cake\Collection\CollectionInterface $roles
  */
?>
<div>
    <h3><?= __('Roles') ?></h3>
    <table class="wide-table" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($roles as $role): ?>
            <tr>
                <td><?= h($role->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-info-sign"></span>'), ['action' => 'view', $role->id],
                        ['escapeTitle' => false , 'title' => 'View Details']) ?>
                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-pencil"></span>'), ['action' => 'edit', $role->id],
                        ['escapeTitle' => false , 'title' => 'Edit Details']) ?>
                    <?= $this->Form->postLink(__('<span class="glyphicon glyphicon-trash"></span>'), ['action' => 'delete', $role->id],
                        ['confirm' => __('Are you sure you want to delete {0}?', $role->name),
                            'escapeTitle' => false , 'title' => 'Delete Role']) ?>
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
