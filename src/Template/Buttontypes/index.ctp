<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Buttontype[]|\Cake\Collection\CollectionInterface $buttontypes
  */
?>


    <h3><?= __('Answer Choice List') ?></h3>
    <table class="wide-table" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($buttontypes as $buttontype): ?>
            <tr>
                <td><?= h($buttontype->text) ?></td>
                <td><?= h($buttontype->type) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-info-sign"></span>'), ['action' => 'view', $buttontype->id], ['escapeTitle' => false , 'title' => 'View Details']) ?>
                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-pencil"></span>'), ['action' => 'edit', $buttontype->id], ['escapeTitle' => false , 'title' => 'Edit Details']) ?>
                    <?= $this->Form->postLink(__('<span class="glyphicon glyphicon-trash alert-danger"></span>'), ['action' => 'delete', $buttontype->id],
                        ['escapeTitle' => false , 'title' => 'Delete Answer Choice',
                            'class' => 'dangerous-action',
                            'danger' => '<h5><strong>If you continue you it might break a Questionnaire or loose Client data that uses this type of Answer Choice.</strong></h5>' .
                                'Only perform this action if you are 100% sure that no important client information will be lost. '])?>
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

