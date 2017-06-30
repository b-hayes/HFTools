<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Run $run
  */
?>
<div>
    <h3><?= h($run->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Session') ?></th>
            <td><?= $run->has('session') ? $this->Html->link($run->session->name, ['controller' => 'Sessions', 'action' => 'view', $run->session->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($run->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($run->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Run Date') ?></th>
            <td><?= h($run->run_date) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Observations') ?></h4>
        <?php if (!empty($run->observations)): ?>
        <table class="wide-table" cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Observer Id') ?></th>
                <th scope="col"><?= __('Participant Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($run->observations as $observations): ?>
            <tr>
                <td><?= h($observations->observer_id) ?></td>
                <td><?= h($observations->participant_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-info-sign"></span>'), ['controller' => 'Observations', 'action' => 'view', $observations->id],
                        ['escapeTitle' => false , 'title' => 'View Details']) ?>
                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-pencil"></span>'), ['controller' => 'Observations', 'action' => 'edit', $observations->id],
                        ['escapeTitle' => false , 'title' => 'Edit Details']) ?>
                    <?= $this->Form->postLink(__('<span class="glyphicon glyphicon-trash"></span>'), ['controller' => 'Observations', 'action' => 'delete', $observations->id],
                        ['confirm' => __('Are you sure you want to delete # {0}?', $observations->id), 'escapeTitle' => false , 'title' => 'View Details']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
