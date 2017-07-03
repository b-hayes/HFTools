<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Questionnaire $questionnaire
 */
?>

<div id="Modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <?php echo $this->requestAction(
                    array('controller'=>'Questions','action'=>'edit')
                ) ?>
                <button type="button" class="pull-right" style="margin-top: -71px" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

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
                <div>
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
<!--            <br><button type="button" class="addQuestion btn btn-info btn-sm" sectionID="--><?php //echo h($sections->id) ?><!--">-->
<!--                Add Question</button>-->
        </div>
    </div>
<?php endforeach; ?>
<!--<br><button type="button" class="addSection pull-right" questionnaireID="--><?php //echo h($questionnaire->id) ?><!--">Add Section</button>-->

<script>
    //TODO: Decided this is a NTH.. buttons are commented out for now.
    //need question to show the add dialog with the appropriate section selected
    //similar with add section n questionnaire
    function editModal() {

    }
    
    function changeEditLinksToModals() {
        $("[title= 'Edit Details']").each(function () {
//            console.log($(this).attr('href'));
            $(this).attr('modalURL', $(this).attr('href')); //move href url to another data type for later
            $(this).attr('href', ''); //and remove the link
            $(this).click(editModal); //and make it pop the modal instead.
        })
    }
    
    $(document).ready(function () {
        changeEditLinksToModals();
    });
</script>