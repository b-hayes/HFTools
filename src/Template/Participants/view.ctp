<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Participant $participant
  */
?>
    <h3><?= h($participant->first_name) ?> <?= h($participant->last_name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th>Related Roles</th>
            <td>
            <?php foreach ($participant->roles as $roles): ?>
                <?= h($roles->name) . ", " ?>
            <?php endforeach; ?>
            </td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($participant->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($participant->phone) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Observations') ?></h4>
        <?php if (!empty($participant->observations)): ?>
        <table class="wide-table" cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Observer Id') ?></th>
                <th scope="col"><?= __('Participant Id') ?></th>
                <th scope="col"><?= __('Run Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($participant->observations as $observations): ?>
            <tr>
                <td><?= h($observations->observer_id) ?></td>
                <td><?= h($observations->participant_id) ?></td>
                <td><?= h($observations->run_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-info-sign"></span>'), ['controller' => 'Observations', 'action' => 'view', $observations->id],
                        ['escapeTitle' => false , 'title' => 'View Details']) ?>
                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-pencil"></span>'), ['controller' => 'Observations', 'action' => 'edit', $observations->id],
                        ['escapeTitle' => false , 'title' => 'Edit Details']) ?>
                    <?= $this->Form->postLink(__('<span class="glyphicon glyphicon-trash"></span>'), ['controller' => 'Observations', 'action' => 'delete', $observations->id],
                        ['confirm' => __('Are you sure you want to delete # {0}?', $observations->id), 'escapeTitle' => false , 'title' => 'Delete']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Clients') ?></h4>
        <?php if (!empty($participant->clients)): ?>
        <table class="wide-table" cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('Client Number') ?></th>
                <th scope="col"><?= __('Contact Number') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Contact Person') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($participant->clients as $clients): ?>
            <tr>
                <td><?= h($clients->name) ?></td>
                <td><?= h($clients->address) ?></td>
                <td><?= h($clients->client_number) ?></td>
                <td><?= h($clients->contact_number) ?></td>
                <td><?= h($clients->email) ?></td>
                <td><?= h($clients->contact_person) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-info-sign"></span>'), ['controller' => 'Clients', 'action' => 'view', $clients->id],
                        ['escapeTitle' => false , 'title' => 'View Details']) ?>
                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-pencil"></span>'), ['controller' => 'Clients', 'action' => 'edit', $clients->id],
                        ['escapeTitle' => false , 'title' => 'Edit Details']) ?>
                    <?= $this->Form->postLink(__('<span class="glyphicon glyphicon-trash"></span>'), ['controller' => 'Clients', 'action' => 'delete', $clients->id],
                        ['confirm' => __('Are you sure you want to delete # {0}?', $clients->id), 'escapeTitle' => false , 'title' => 'Delete']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
<!--ToDo: Remove this table code if we decide not to un-hide it after review...-->
    <div class="related" style="display: none">
        <h4><?= __('Related Roles') ?></h4>
        <?php if (!empty($participant->roles)): ?>
        <table class="wide-table" cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($participant->roles as $roles): ?>
            <tr>
                <td><?= h($roles->id) ?></td>
                <td><?= h($roles->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-info-sign"></span>'), ['controller' => 'Roles', 'action' => 'view', $roles->id]) ?>
                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-pencil"></span>'), ['controller' => 'Roles', 'action' => 'edit', $roles->id]) ?>
                    <?= $this->Form->postLink(__('<span class="glyphicon glyphicon-trash"></span>'), ['controller' => 'Roles', 'action' => 'delete', $roles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $roles->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Sessions') ?></h4>
        <?php if (!empty($participant->sessions)): ?>
        <table class="wide-table" cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Start Date') ?></th>
                <th scope="col"><?= __('End Date') ?></th>
                <th scope="col"><?= __('Client Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($participant->sessions as $sessions): ?>
            <tr>
                <td><?= h($sessions->name) ?></td>
                <td><?= h($sessions->description) ?></td>
                <td><?= h($sessions->start_date) ?></td>
                <td><?= h($sessions->end_date) ?></td>
                <td><?= h($sessions->client_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-info-sign"></span>'), ['controller' => 'Sessions', 'action' => 'view', $sessions->id],
                        ['escapeTitle' => false , 'title' => 'View Details']) ?>
                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-pencil"></span>'), ['controller' => 'Sessions', 'action' => 'edit', $sessions->id],
                        ['escapeTitle' => false , 'title' => 'Edit Details']) ?>
                    <?= $this->Form->postLink(__('<span class="glyphicon glyphicon-trash"></span>'), ['controller' => 'Sessions', 'action' => 'delete', $sessions->id],
                        ['confirm' => __('Are you sure you want to delete # {0}?', $sessions->id), 'escapeTitle' => false , 'title' => 'Delete']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
