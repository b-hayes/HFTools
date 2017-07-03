<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Session $session
  */
?>
<div>
    <h3><?= h($session->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($session->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Client') ?></th>
            <td><?= $session->has('client') ? $this->Html->link($session->client->name, ['controller' => 'Clients', 'action' => 'view', $session->client->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Date') ?></th>
            <td><?= h($session->start_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End Date') ?></th>
            <td><?= h($session->end_date) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Runs') ?></h4>
        <?php if (!empty($session->runs)): ?>
        <table class="wide-table" cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Run Date') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($session->runs as $runs): ?>
            <tr>
                <td><?= h($runs->run_date) ?></td>
                <td><?= h($runs->name) ?></td>
                <td><?= h($runs->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-info-sign"></span>'), ['controller' => 'Runs', 'action' => 'view', $runs->id],
                        ['escapeTitle' => false , 'title' => 'View Details']) ?>
                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-pencil"></span>'), ['controller' => 'Runs', 'action' => 'edit', $runs->id],
                        ['escapeTitle' => false , 'title' => 'Edit Details']) ?>
                    <?= $this->Form->postLink(__('<span class="glyphicon glyphicon-trash"></span>'), ['controller' => 'Runs', 'action' => 'delete', $runs->id],
                        ['confirm' => __('Are you sure you want to delete # {0}?', $runs->id), 'escapeTitle' => false , 'title' => 'Delete']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Participants') ?></h4>
        <?php if (!empty($session->participants)): ?>
        <table class="wide-table" cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('First Name') ?></th>
                <th scope="col"><?= __('Last Name') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Phone') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($session->participants as $participants): ?>
            <tr>
                <td><?= h($participants->first_name) ?></td>
                <td><?= h($participants->last_name) ?></td>
                <td><?= h($participants->email) ?></td>
                <td><?= h($participants->phone) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-info-sign"></span>'), ['controller' => 'Participants', 'action' => 'view', $participants->id],
                        ['escapeTitle' => false , 'title' => 'View Details']) ?>
                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-pencil"></span>'), ['controller' => 'Participants', 'action' => 'edit', $participants->id],
                        ['escapeTitle' => false , 'title' => 'Edit Details']) ?>
                    <?= $this->Form->postLink(__('<span class="glyphicon glyphicon-trash"></span>'), ['controller' => 'Participants', 'action' => 'delete', $participants->id],
                        ['confirm' => __('Are you sure you want to delete # {0}?', $participants->id), 'escapeTitle' => false , 'title' => 'Delete']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
