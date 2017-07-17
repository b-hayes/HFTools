<?php
/**
 * @var \App\View\AppView $this
 */
?>

<!-- This is for adding a new participant to current session -->
<div id="ModalAddRun" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div id="ModalAddRun-Contents">
                    <?= $this->requestAction(
                        array('controller'=>'Runs', 'action'=>'modalAdd')
                    )?>
                </div>
            </div>
            <div class="modal-footer">
                <button id="ModalAddRun-SubmitButton" type="button" class="pull-left">Submit</button>
                <button type="button" class="pull-right" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>




    <?= $this->Form->create($observation) ?>
    <fieldset>
        <legend><?= __('Create New Observation') ?></legend>
        <?= $this->Form->control('observer_id', ['options' => $participants]); ?>
        <?= $this->Form->control('participant._id', array(
            'label' => 'Participants',
            'type' => 'select',
            'multiple' => 'checkbox',
            'options' => $participants,
            'value' => $participants
        )) ?>

        <?= $this->Form->control('run_id', ['options' => $runs]) ?>

        <div class="panel panel-info">
            <div class="panel panel-heading"  data-toggle="collapse" data-target="#collapse_0" style="margin-bottom: 1px">
                <a><span class="glyphicon glyphicon-info-sign"></span> Need to create a run?</a>
            </div>
            <div id="collapse_0" class="panel-body collapse">
                <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#ModalAddRun">Create New Run</button>
            </div>
        </div>


        <?= $this->Form->control('questionnaire_id', ['options' => $questionnaires, 'label' => 'Select tool']) ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>

<script>
    $(document).ready(function() {

        function SubmitModal(modelData) {

            form = modalContent.find("form");
            let formData = form.serialize();
            let formUrl = form.attr("action");

            $.when(
                $.ajax({
                    url: formUrl,
                    type: 'POST',
                    data: formData,
                    dataType: "html",
                    success: function(result){
                        let error = $(result).find(".error-message").first().html();
                        if(error) {
                            //if error message exists.. display the new form with validation messages
                            $(modalContent).html(result);
                        } else {
                            //no error..
                            modal.modal('hide');
                            modalContent.html(originalForm);
                        }
                    }
                })
            ).then(function () {
                location.reload();
                }
            );
        }

        $("#ModalAddRun-SubmitButton").click(function() {
            let modelData = {
                'modal': $("#ModalAddRun"),
                'modalContent': $("#ModalAddRun-Contents"),
                'form': modalContent.find("form"),
                'originalForm' : form.clone()
            };
            SubmitModal(modelData);
        });




    });
</script>

