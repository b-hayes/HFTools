<?php
/**
* @var \App\View\AppView $this
*/
?>

<h3><?= h($user->id) ?></h3>
<table class="vertical-table">
    <tr>
        <th scope="row"><?= __('Client') ?></th>
        <td><?= $user->has('client') ? $this->Html->link($user->client->name, ['controller' => 'Clients', 'action' =>
            'view', $user->client->id]) : '' ?>
        </td>
    </tr>
    <tr>
        <th scope="row"><?= __('Username') ?></th>
        <td><?= h($user->username) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Password') ?></th>
        <td><?= h($user->password) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Id') ?></th>
        <td><?= $this->Number->format($user->id) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Created') ?></th>
        <td><?= h($user->created) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Modified') ?></th>
        <td><?= h($user->modified) ?></td>
    </tr>
</table>
<div class="row">
    <h4><?= __('Role') ?></h4>
    <?= $this->Text->autoParagraph(h($user->role)); ?>
</div>
