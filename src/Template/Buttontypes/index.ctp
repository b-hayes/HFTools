<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Buttontype[]|\Cake\Collection\CollectionInterface $buttontypes
  */
?>

<div class="buttontypes index large-9 medium-8 columns content">
    <h3><?= __('Buttontypes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('text') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($buttontypes as $buttontype): ?>
            <tr>
                <td><?= $this->Number->format($buttontype->id) ?></td>
                <td><?= h($buttontype->text) ?></td>
                <td><?= h($buttontype->type) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $buttontype->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $buttontype->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $buttontype->id], ['confirm' => __('Are you sure you want to delete # {0}?', $buttontype->id)]) ?>
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