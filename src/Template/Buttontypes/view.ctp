<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Buttontype $buttontype
  */
?>

    <h3><?= h('Answer Choice') ?></h3>
    <table class="vertical-table wide-table" cellpadding="0" cellspacing="0">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td class=""><?= h($buttontype->text) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td class=""><?= h($buttontype->type) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Labels and values') ?></h4>
        <?php if (!empty($buttontype->buttonvalues)): ?>
        <table class="wide-table" cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Label') ?></th>
                <th scope="col"><?= __('Value') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($buttontype->buttonvalues as $buttonvalues): ?>
            <tr>
                <td><?= h($buttonvalues->text_label) ?></td>
                <td><?= h($buttonvalues->text_value) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-info-sign"></span>'), ['controller' => 'Buttonvalues', 'action' => 'view', $buttonvalues->id], ['escapeTitle' => false , 'title' => 'View Details']) ?>
                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-pencil"></span>'), ['controller' => 'Buttonvalues', 'action' => 'edit', $buttonvalues->id], ['escapeTitle' => false , 'title' => 'View Details']) ?>
                    <?= $this->Form->postLink(__('<span class="glyphicon glyphicon-trash"></span>'), ['controller' => 'Buttonvalues', 'action' => 'delete', $buttonvalues->id], ['confirm' => __('Are you sure you want to delete # {0}?', $buttonvalues->text_label), 'escapeTitle' => false, 'title' => 'Delete Client']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>

