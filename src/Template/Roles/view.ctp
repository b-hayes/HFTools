<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Role $role
  */
?>
<div>
    <h3><?= h($role->name) ?></h3>
    <div class="related">
        <h4><?= __('Related Participants') ?></h4>
        <?php if (!empty($role->participants)): ?>
        <table class="wide-table" cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('First Name') ?></th>
                <th scope="col"><?= __('Last Name') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Phone') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($role->participants as $participants): ?>
            <tr>
                <td><?= h($participants->first_name) ?></td>
                <td><?= h($participants->last_name) ?></td>
                <td><?= h($participants->email) ?></td>
                <td><?= h($participants->phone) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-info-sign"></span>'), ['controller' => 'Participants', 'action' => 'view', $participants->id]) ?>
                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-pencil"></span>'), ['controller' => 'Participants', 'action' => 'edit', $participants->id]) ?>
                    <?= $this->Form->postLink(__('<span class="glyphicon glyphicon-trash"></span>'), ['controller' => 'Participants', 'action' => 'delete', $participants->id], ['confirm' => __('Are you sure you want to delete # {0}?', $participants->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
