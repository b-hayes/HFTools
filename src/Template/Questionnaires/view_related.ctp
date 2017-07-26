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
            <div class="pull-right" style="text-align: right">
                <?= $this->Html->link(__('<span class="glyphicon glyphicon-pencil"></span>'), ['controller' => 'Sections', 'action' => 'edit', $sections->id],
                    ['escapeTitle' => false , 'title' => 'Edit Details']) ?>
                <?= $this->Form->postLink(__('<span class="glyphicon glyphicon-trash alert-danger"></span>'), ['controller' => 'Sections', 'action' => 'delete', $sections->id],
                    ['escapeTitle' => false , 'title' => 'Delete Section',
                        'class' => 'dangerous-action',
                        'danger' => '<h5><strong>If you continue you will loose ALL data that Clients have associated with this Section and its Questions.</strong></h5>' .
                            'Only perform this action if you are 100% sure that no important client information will be lost. ']) ?>
            </div> <BR />

            <!-- Added this so that if description isn't added this won't be displayed -->
            <?php if($sections->description != ''): ?>

                <strong>Description of section:</strong> <?= h($sections->description) ?>

            <?php endif; ?>

        </div>

        <div class="panel-body">
            <?php foreach($sections->questions as $questions): ?>
                <div class="clearfix">
                    <?= h($questions->text) ?>
                    <div class="pull-right">
                        <?= $this->Html->link(__('<span class="glyphicon glyphicon-pencil"></span>'), ['controller' => 'Questions', 'action' => 'edit', $questions->id],
                            ['escapeTitle' => false , 'title' => 'Edit Details']) ?>
                            <?= $this->Form->postLink(__('<span class="glyphicon glyphicon-trash alert-danger"></span>'), ['controller' => 'Questions', 'action' => 'delete', $questions->id],
                                ['escapeTitle' => false , 'title' => 'Delete Question',
                                'class' => 'dangerous-action',
                                'danger' => '<h5><strong>If you continue you will loose ALL data that clients have associated with this Question.</strong></h5>' .
                                'Only perform this action if you are 100% sure that no important client information will be lost. ']) ?>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="row" style="margin-top: 15px">
<!--                --><?php //echo $this->Html->link(__('<button class="btn btn-info pull-right">Add Question...</button>'), ['controller' => 'Questions', 'action' => 'add', $sections->id],
//                    ['escapeTitle' => false , 'title' => 'Add Section']) ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<?php //echo $this->Html->link(__('<button class="btn btn-info pull-right">Add Section...</button>'), ['controller' => 'Sections', 'action' => 'add', $sections->id],
//    ['escapeTitle' => false , 'title' => 'Add Section']) ?>
