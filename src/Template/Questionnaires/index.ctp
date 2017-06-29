<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Questionnaire[]|\Cake\Collection\CollectionInterface $questionnaires
  */
?>
    <h3><?= __('Questionnaires') ?></h3>
    <table style="min-width: 750px; width: 100%" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($questionnaires as $questionnaire): ?>
            <tr>
                <td><?= $this->Number->format($questionnaire->id) ?></td>
                <td><?= h($questionnaire->name) ?></td>
                <td><?= h($questionnaire->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'viewRelated', $questionnaire->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $questionnaire->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $questionnaire->id], ['confirm' => __('Are you sure you want to delete # {0}?', $questionnaire->id)]) ?>
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
