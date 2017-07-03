<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Buttonvalue[]|\Cake\Collection\CollectionInterface $buttonvalues
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Buttonvalue'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Buttontypes'), ['controller' => 'Buttontypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Buttontype'), ['controller' => 'Buttontypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="buttonvalues index large-9 medium-8 columns content">
    <h3><?= __('Buttonvalues') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('text_lable') ?></th>
                <th scope="col"><?= $this->Paginator->sort('text_value') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($buttonvalues as $buttonvalue): ?>
            <tr>
                <td><?= $this->Number->format($buttonvalue->id) ?></td>
                <td><?= h($buttonvalue->text_lable) ?></td>
                <td><?= h($buttonvalue->text_value) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $buttonvalue->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $buttonvalue->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $buttonvalue->id], ['confirm' => __('Are you sure you want to delete # {0}?', $buttonvalue->id)]) ?>
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
