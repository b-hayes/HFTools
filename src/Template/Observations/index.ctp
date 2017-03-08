<?php
/**
* @var \App\View\AppView $this
*/
?>

<h3><?= __('Observations') ?></h3>
<?php
$client_id = $this->request->session()->read('Auth.User.client_id');
if(count($observations) < 1 && $client_id != null){
echo "<P>No observations made for this run yet. Please click the Make new Observation button to start.</P>";
}else{
?>
<table cellpadding="0" cellspacing="0">
    <thead>
    <tr>
        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('observer_id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('participant_id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('run_id') ?></th>
        <th scope="col" class="actions"><?= __('Actions') ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($observations as $observation): ?>
    <tr>
        <td><?= $this->Number->format($observation->id) ?></td>
        <td><?= $this->Number->format($observation->observer_id) ?></td>
        <td><?= $observation->has('participant') ? $this->Html->link($observation->participant->id, ['controller' =>
            'Participants', 'action' => 'view', $observation->participant->id]) : '' ?>
        </td>
        <td><?= $observation->has('run') ? $this->Html->link($observation->run->name, ['controller' => 'Runs', 'action'
            => 'view', $observation->run->id]) : '' ?>
        </td>
        <td class="actions">
            <?= $this->Html->link(__('View'), ['action' => 'view', $observation->id]) ?>
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $observation->id]) ?>
            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $observation->id], ['confirm' => __('Are you
            sure you want to delete # {0}?', $observation->id)]) ?>
        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->first('<< ' . __('first')) ?>
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
        <?= $this->Paginator->last(__('last') . ' >>') ?>
    </ul>
    <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of
        {{count}} total')]) ?></p>
</div>
<?php
}
?>


