<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Client $client
  */
?>
    <h3><?= h($client->name) ?></h3>
    <table class="vertical-table wide-table">
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($client->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Client Number') ?></th>
            <td><?= h($client->client_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact Number') ?></th>
            <td><?= h($client->contact_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($client->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact Person') ?></th>
            <td><?= h($client->contact_person) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Acount Created') ?></th>
            <td><?= h($client->acount_created) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Sessions') ?></h4>
        <?php if (!empty($client->sessions)): ?>
        <table class="wide-table" cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Start Date') ?></th>
                <th scope="col"><?= __('End Date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($client->sessions as $sessions): ?>
            <tr>
                <td><?= h($sessions->name) ?></td>
                <td><?= h($sessions->description) ?></td>
                <td><?= h($sessions->start_date) ?></td>
                <td><?= h($sessions->end_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-info-sign"></span>'), ['controller' => 'Sessions', 'action' => 'view', $sessions->id],
                        ['escapeTitle' => false , 'title' => 'View Details']) ?>
                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-pencil"></span>'), ['controller' => 'Sessions', 'action' => 'edit', $sessions->id],
                        ['escapeTitle' => false , 'title' => 'Edit Details']) ?>
                    <?= $this->Form->postLink(__('<span class="glyphicon glyphicon-trash"></span>'), ['controller' => 'Sessions', 'action' => 'delete', $sessions->id],
                        ['confirm' => __('Are you sure you want to delete # {0}?', $sessions->id), 'escapeTitle' => false, 'title' => 'Delete']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($client->users)): ?>
        <table class="wide-table" cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Username') ?></th>
                <th scope="col"><?= __('Role') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Last Login') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($client->users as $users): ?>
            <tr>
                <td><?= h($users->username) ?></td>
                <td><?= h($users->role) ?></td>
                <td><?= h($users->created) ?></td>
                <td><?= h($users->last_login) ?></td>
                <td><?= h($users->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-info-sign"></span>'), ['controller' => 'Users', 'action' => 'view', $users->id],
                        ['escapeTitle' => false , 'title' => 'View Details']) ?>
                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-pencil"></span>'), ['controller' => 'Users', 'action' => 'edit', $users->id],
                        ['escapeTitle' => false , 'title' => 'Edit Details']) ?>
                    <?= $this->Form->postLink(__('<span class="glyphicon glyphicon-trash"></span>'), ['controller' => 'Users', 'action' => 'delete', $users->id],
                        ['confirm' => __('Are you sure you want to delete # {0}?', $users->id), 'escapeTitle' => false , 'title' => 'Delete']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Participants') ?></h4>
        <?php if (!empty($client->participants)): ?>
        <table class="wide-table" cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('First Name') ?></th>
                <th scope="col"><?= __('Last Name') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Phone') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($client->participants as $participants): ?>
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
