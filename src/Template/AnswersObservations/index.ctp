<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\AnswersObservation[]|\Cake\Collection\CollectionInterface $answersObservations
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Answers Observation'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Observations'), ['controller' => 'Observations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Observation'), ['controller' => 'Observations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Answers'), ['controller' => 'Answers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Answer'), ['controller' => 'Answers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="answersObservations index large-9 medium-8 columns content">
    <h3><?= __('Answers Observations') ?></h3>
    <table class="wide-table" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('observation_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('answer_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($answersObservations as $answersObservation): ?>
            <tr>
                <td><?= $answersObservation->has('observation') ? $this->Html->link($answersObservation->observation->id, ['controller' => 'Observations', 'action' => 'view', $answersObservation->observation->id]) : '' ?></td>
                <td><?= $answersObservation->has('answer') ? $this->Html->link($answersObservation->answer->id, ['controller' => 'Answers', 'action' => 'view', $answersObservation->answer->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-info-sign"></span>'), ['action' => 'view', $answersObservation->observation_id]) ?>
                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-pencil"></span>'), ['action' => 'edit', $answersObservation->observation_id]) ?>
                    <?= $this->Form->postLink(__('<span class="glyphicon glyphicon-trash"></span>'), ['action' => 'delete', $answersObservation->observation_id], ['confirm' => __('Are you sure you want to delete # {0}?', $answersObservation->observation_id)]) ?>
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
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
