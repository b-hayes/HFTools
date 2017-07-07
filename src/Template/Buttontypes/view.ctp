<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Buttontype $buttontype
  */
?>
<div class="buttontypes view large-9 medium-8 columns content">
    <h3><?= h($buttontype->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Text') ?></th>
            <td><?= h($buttontype->text) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($buttontype->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($buttontype->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Buttonvalues') ?></h4>
        <?php if (!empty($buttontype->buttonvalues)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Text Label') ?></th>
                <th scope="col"><?= __('Text Value') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($buttontype->buttonvalues as $buttonvalues): ?>
            <tr>
                <td><?= h($buttonvalues->id) ?></td>
                <td><?= h($buttonvalues->text_label) ?></td>
                <td><?= h($buttonvalues->text_value) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Buttonvalues', 'action' => 'view', $buttonvalues->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Buttonvalues', 'action' => 'edit', $buttonvalues->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Buttonvalues', 'action' => 'delete', $buttonvalues->id], ['confirm' => __('Are you sure you want to delete # {0}?', $buttonvalues->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
