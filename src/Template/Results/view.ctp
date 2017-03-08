<?php
/**
* @var \App\View\AppView $this
*/
?>

<h3><?= h($result->id) ?></h3>
<table class="vertical-table">
    <tr>
        <th scope="row"><?= __('Observation') ?></th>
        <td><?= $result->has('observation') ? $this->Html->link($result->observation->id, ['controller' =>
            'Observations', 'action' => 'view', $result->observation->id]) : '' ?>
        </td>
    </tr>
    <tr>
        <th scope="row"><?= __('Q Key') ?></th>
        <td><?= h($result->q_key) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Q Value') ?></th>
        <td><?= h($result->q_value) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Img') ?></th>
        <td><?= h($result->img) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Id') ?></th>
        <td><?= $this->Number->format($result->id) ?></td>
    </tr>
</table>
