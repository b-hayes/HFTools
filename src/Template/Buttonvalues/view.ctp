<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Buttonvalue $buttonvalue
  */
?>

<div class="buttonvalues view large-9 medium-8 columns content">
    <h3><?= h($buttonvalue->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Text Lable') ?></th>
            <td><?= h($buttonvalue->text_lable) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Text Value') ?></th>
            <td><?= h($buttonvalue->text_value) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($buttonvalue->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Buttontypes') ?></h4>
        <?php if (!empty($buttonvalue->buttontypes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Text') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($buttonvalue->buttontypes as $buttontypes): ?>
            <tr>
                <td><?= h($buttontypes->id) ?></td>
                <td><?= h($buttontypes->text) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Buttontypes', 'action' => 'view', $buttontypes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Buttontypes', 'action' => 'edit', $buttontypes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Buttontypes', 'action' => 'delete', $buttontypes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $buttontypes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
