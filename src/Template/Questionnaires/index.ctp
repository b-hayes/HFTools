<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Questionnaire[]|\Cake\Collection\CollectionInterface $questionnaires
  */
?>
    <h3><?= __('Questionnaires') ?></h3>
    <table class="wide-table" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($questionnaires as $questionnaire): ?>
            <tr>
                <td><?= h($questionnaire->name) ?></td>
                <td><?= h($questionnaire->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-info-sign"></span>'), ['action' => 'viewRelated', $questionnaire->id],
                        ['escapeTitle' => false , 'title' => 'View Details']) ?>
                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-pencil"></span>'), ['action' => 'edit', $questionnaire->id],
                        ['escapeTitle' => false , 'title' => 'Edit Details']) ?>
                    <?= $this->Form->postLink(__('<span class="glyphicon glyphicon-trash alert-danger"></span>'), ['action' => 'delete', $questionnaire->id],
                        ['escapeTitle' => false , 'title' => 'Delete Questionnaire',
                        'class' => 'dangerous-action',
                        'danger' => '<h5><strong>If you continue you will loose ALL data that Clients have associated with this Questionnaire.</strong></h5>' .
                    'Only perform this action if you are 100% sure that no important client information will be lost. ']) ?>
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
