<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Section $section
  */
?>
<div>
    <h3><?= h($section->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Questionnaire') ?></th>
            <td><?= $section->has('questionnaire') ? $this->Html->link($section->questionnaire->name, ['controller' => 'Questionnaires', 'action' => 'view', $section->questionnaire->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($section->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($section->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($section->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Questions') ?></h4>
        <?php if (!empty($section->questions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Section Id') ?></th>
                <th scope="col"><?= __('Text') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($section->questions as $questions): ?>
            <tr>
                <td><?= h($questions->id) ?></td>
                <td><?= h($questions->section_id) ?></td>
                <td><?= h($questions->text) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Questions', 'action' => 'view', $questions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Questions', 'action' => 'edit', $questions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Questions', 'action' => 'delete', $questions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $questions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
