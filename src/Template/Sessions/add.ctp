<?php
/**
 * @var \App\View\AppView $this
 */
?>

<div id="ModalAddParticipant" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div id="ModalAddParticipant-Contents">
                    <?= $this->requestAction(
                        array('controller'=>'Participants','action'=>'add')
                    ) ?>
                </div>
            </div>
            <div class="modal-footer">
                <button id="ModalAddParticipant-SubmitButton" type="button" class="pull-left">Submit</button>
                <button type="button" class="pull-right" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<div>
    <?= $this->Form->create($session) ?>
    <fieldset>
        <legend><?= __('Add Session') ?></legend>
        <div>
            <?php
            echo $this->Form->control('client_id', ['option' => $clients, 'baseURL' => $this->Html->Url->build(
                ['controller'=>'Sessions', 'action'=>'displaySpecificParticipants']), 'empty' => true]);
            ?>
            <div id="part-list" class="col-md-8">
                Please select a Client.
            </div>

            <div class="alert alert-info clearfix col-md-4">
                <p>Cant find the participant your looking for?</p><br>
                <!--            <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#ModalAddParticipant">Create New Participant...</button>-->
                <a href="<?php echo $this->Html->Url->build([
                    'controller'=>'Participants', 'action'=>'add'
                ]); ?>" type="button" class="btn btn-info pull-right">Create New Participant...</a>
            </div>
        </div>
        <?php
        echo $this->Form->control('name');
        echo $this->Form->control('description');

        // this turns the date from Y-m-d to D-m-y
        $this->Form->templates(
            ['dateWidget' => '{{day}}{{month}}{{year}}']
        );


        echo $this->Form->control('start_date', ['type' => 'text']);
        echo $this->Form->control('end_date', ['type' => 'text']);
        ?>

    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<script>

    function getMobileOperatingSystem() {
        var userAgent = navigator.userAgent || navigator.vendor || window.opera;

        // Windows Phone must come first because its UA also contains "Android"
        if (/windows phone/i.test(userAgent)) {
            return "Windows Phone";
        }

        if (/android/i.test(userAgent)) {
            return "Android";
        }

        // iOS detection from: http://stackoverflow.com/a/9039885/177710
        if (/iPad|iPhone|iPod/.test(userAgent) && !window.MSStream) {
            return "iOS";
        }

        return "unknown";
    }


    $(document).ready(function(){
        var ClientID = $("#client-id").val();
        var baseURL = $("#client-id").attr('baseURL');

        function getParticipants() {
            if(ClientID == ""){
                $("#part-list").html("Please select a Client.");
            } else{
                $("#part-list").load(baseURL + "/" + ClientID);
            }
        }

        $("#client-id").change(function () {
            ClientID = $("#client-id").val();
            getParticipants();
        });

        //stuff for add participant modal
        var modal = $("#ModalAddParticipant");
        var modalContent = $("#ModalAddParticipant-Contents");
        var form = modalContent.find("form"); //$("#ModalAddParticipant").find("form");

        function resetModal() {
            console.log("form reset");
//            form = $(modalContent).find("form");
            form.find("button:submit").hide(); //hid the submit button he form normally uses.
//            console.log(form.html());
        }

        function SubmitModal() {
            console.log(">>>>>>>>Submit pressed");
            form = modalContent.find("form");
            console.log(form.html());
            var formData = form.serialize(); //$("#ModalAddParticipant").find("form").serialize();
            var formUrl = form.attr("action"); //$("#ModalAddParticipant").find("form").attr("action");
            console.log(formData);
            console.log(formUrl);
            $.when(
                $.ajax({
                    url: formUrl,
                    type: 'POST',
                    data: formData,
                    dataType: "html",
                    success: function(result){
                        console.log(">>>>>RESULT:");
                        console.log(result);
                        var error = $(result).find(".error-message").first();
                        console.log(error.html());
                        if(error != undefined) {
                            $(result).find("button:submit").hide();
                            //if there was an error in the result change the modal with the new form with validation messages.
                            $(modalContent).html(result);
                        } else {
                            modal.modal('hide');
                            getParticipants();
                        }
                    }
                })
            ).then(function () {
                    resetModal();
                }
            );
        }

        resetModal();
        $("#ModalAddParticipant-SubmitButton").click(SubmitModal);

        if(getMobileOperatingSystem()!="unknown"){
            //mobile devices use native OS date picker
            $("#start-date").attr('type', 'date');
            $("#end-date").attr('type', 'date');
        } else {
            //Desktop devices use javascript datepicker
            $("#start-date").attr('readonly', 'true');
            $("#end-date").attr('readonly', 'true');
            $("#start-date").datepicker({
                format: "dd/mm/yyyy",
                autoclose: true,
                todayBtn: true,
                orientation: "auto",
                todayHighlight: true
            });
            $("#end-date").datepicker({
                format: "dd/mm/yyyy",
                autoclose: true,
                todayBtn: true,
                orientation: "auto",
                todayHighlight: true
            });
        }
    });
</script>
