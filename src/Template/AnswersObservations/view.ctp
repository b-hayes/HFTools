<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\AnswersObservation $answersObservation
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Answers Observation'), ['action' => 'edit', $answersObservation->observation_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Answers Observation'), ['action' => 'delete', $answersObservation->observation_id], ['confirm' => __('Are you sure you want to delete # {0}?', $answersObservation->observation_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Answers Observations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Answers Observation'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Observations'), ['controller' => 'Observations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Observation'), ['controller' => 'Observations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Answers'), ['controller' => 'Answers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Answer'), ['controller' => 'Answers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="answersObservations view large-9 medium-8 columns content">
    <h3><?= h($answersObservation->observation_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Observation') ?></th>
            <td><?= $answersObservation->has('observation') ? $this->Html->link($answersObservation->observation->id, ['controller' => 'Observations', 'action' => 'view', $answersObservation->observation->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Answer') ?></th>
            <td><?= $answersObservation->has('answer') ? $this->Html->link($answersObservation->answer->id, ['controller' => 'Answers', 'action' => 'view', $answersObservation->answer->id]) : '' ?></td>
        </tr>
    </table>
</div>
