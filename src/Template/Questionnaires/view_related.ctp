<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Questionnaire $questionnaire
 */
?>


<h3><?= h($questionnaire->name) ?></h3>
<h4><?= h($questionnaire->description) ?></h4>
<?php foreach($questionnaire->sections as $sections): ?>
    <div class="panel panel-info">
        <div class="panel-heading">
            <strong>Section title:</strong> <?= h($sections->name) ?>
            <BR />

            <!-- Added this so that if description isn't added this won't be displayed -->
            <?php if($sections->description != ''): ?>

                <strong>Description of section:</strong> <?= h($sections->description) ?>
                <div class="pull-right">
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Sections', 'action' => 'edit', $sections->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Sections', 'action' => 'delete', $sections->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sections->id)]) ?>
                </div>

            <?php endif; ?>
        </div>
        <div class="panel-body">
            <?php foreach($sections->questions as $questions): ?>
                <div>
                    <?= h($questions->text) ?>
                    <div class="pull-right">
                        <?= $this->Html->link(__('Edit'), ['controller' => 'Questions', 'action' => 'edit', $questions->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'Questions', 'action' => 'delete', $questions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $questions->id)]) ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endforeach; ?>
