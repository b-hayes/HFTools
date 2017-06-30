<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Questionnaire $questionnaire
 */
?>
<!-- Just testing an idea -->

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">New Question for Section X</h4>
            </div>
            <div class="modal-body">
                <?= $this->requestAction(
                    array('controller'=>'Questions','action'=>'add')
                ) ?>
                <button type="button" class="pull-right" style="margin-top: -70px" data-dismiss="modal">Cancel</button>
            </div>
<!--            <div class="modal-footer">-->
<!--                <button type="submit" class="btn btn-default">Submit</button>-->
<!--                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>-->
<!--            </div>-->
        </div>

    </div>
</div>

<h3><?= h($questionnaire->name) ?></h3>
<h4><?= h($questionnaire->description) ?></h4>
<?php foreach($questionnaire->sections as $sections): ?>
    <div class="panel panel-info">
        <div class="panel-heading">
            <strong>Section title:</strong> <?= h($sections->name) ?>
            <div class="pull-right">
                <?= $this->Html->link(__('<span class="glyphicon glyphicon-pencil"></span>'), ['controller' => 'Sections', 'action' => 'edit', $sections->id],
                    ['escapeTitle' => false , 'title' => 'Edit Details']) ?>
                <?= $this->Form->postLink(__('<span class="glyphicon glyphicon-trash alert-danger"></span>'), ['controller' => 'Sections', 'action' => 'delete', $sections->id],
                    ['confirm' => __('WARNING!: This will delete the entire section and the questions it contains. Are you sure?', $sections->id), 'escapeTitle' => false , 'title' => 'Delete']) ?>
            </div> <BR />
            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Add Question</button>
            <!-- Added this so that if description isn't added this won't be displayed -->
            <?php if($sections->description != ''): ?>

                <strong>Description of section:</strong> <?= h($sections->description) ?>

            <?php endif; ?>

        </div>
        <div class="panel-body">
            <?php foreach($sections->questions as $questions): ?>
                <div>
                    <?= h($questions->text) ?>
                    <div class="pull-right">
                        <?= $this->Html->link(__('<span class="glyphicon glyphicon-pencil"></span>'), ['controller' => 'Questions', 'action' => 'edit', $questions->id],
                            ['escapeTitle' => false , 'title' => 'Edit Details']) ?>
                        <?= $this->Form->postLink(__('<span class="glyphicon glyphicon-trash"></span>'), ['controller' => 'Questions', 'action' => 'delete', $questions->id],
                            ['confirm' => __('Are you sure you want to delete # {0}?', $questions->id), 'escapeTitle' => false , 'title' => 'Edit Details']) ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endforeach; ?>
