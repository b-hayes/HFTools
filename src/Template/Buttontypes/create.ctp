<?php
/**
 * @var \App\View\AppView $this
 */
?>
<?= $this->Form->create('Buttontype') ?>


<fieldset>
    <legend><?= __('button type (temp)') ?></legend>
    <?php
    // name and description of this questionnaire being created
    echo $this->Form->control('text', ['label' => 'input name']);
    echo $this->Form->control('type', ['options' => ['radioButton' => 'Radio Buttons', 'textArea' => 'Text area']]);
    ?>

    <!-- the default inputs for a basic questionnaire -->
    <div id="buttonvalues">
        <div id="buttonvalues0" buttonvalues="0" class="section">
            <div id="buttonValues">
                <?= $this->Form->control('buttonvalues.0.text_label'); ?>
                <?= $this->Form->control('buttonvalues.0.text_value'); ?>
            </div>
        </div>
    </div>

    <?= $this->Form->button(__('<span class="glyphicon glyphicon-floppy-disk"></span> Submit'), ['escapeTitle' => false]) ?>
    <?= $this->Form->end() ?>

    <!-- button to append more sections -->
    <Button id="add_buttonvalue" type="Button"><span class="glyphicon glyphicon-plus"></span> Add new text value pair</Button>
</fieldset>

<script>
    $(document).ready(function () {
        var buttonValuteCounter = 0;

        // append a new input when the user has clicked add new section button.
        $("#add_buttonvalue").click(function () {
            buttonValuteCounter++;

            $("#buttonvalues").append("<div id='buttonvalues" + buttonValuteCounter + "' class='section'></div>");
            var NewSection =
                $("#buttonvalues" + buttonValuteCounter).append("<label for='buttonvalues-" + buttonValuteCounter + "-text_label' >text label</label>")
                    .append("<input type='text' name='buttonvalues[" + buttonValuteCounter + "][text_label]'>")
                    .append("<label for='buttonvalues-" + buttonValuteCounter + "-text_value'>text value</label>")
                    .append("<input type='text' name='buttonvalues[" + buttonValuteCounter + "][text_value]'>")

                    // keep track of how many times a question is added for this specific section
                    .append("<button class='delete btn btn-danger pull-right' type='button'><span class='glyphicon glyphicon-trash'></span> Delete value pair</button>");

            // make a copy of the button type select options
            var typeList = $("#buttonTypes").clone();

            //make sure add question button can find out what section it lives in
            NewSection.attr("section", buttonValuteCounter);

            UpdateEventHandlers();
            scrollDown();
        });

        function DeleteMe() {
            if(confirm("Are your sure?")){
                $(this).parent().remove();
            }
        }

        function scrollDown() {
            $("html, body").animate({ scrollTop: $(document).height() }, "slow");
        }

        function UpdateEventHandlers() {
            //Delete buttons (questions and sections)
            $(".delete").unbind("click").on("click", DeleteMe);

            //delete buttons highlight what will be affected by the action
            $(".delete").hover(function(){
                $(this).parent().css("background-color", "#ffccbe");

            }, function(){
                $(this).parent().css("background-color", "");
            });
        }
    });
</script>