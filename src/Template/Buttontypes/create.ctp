<?php
/**
 * @var \App\View\AppView $this
 */
?>

<div class="panel panel-info">
    <div class="panel panel-heading collapse-next" style="margin-bottom: 1px">
        <!--            This tiangle glyph was going to be used for animated expand collapse but ran out of time to impliment it -->
        <!--            <span class="glyphicon glyphicon glyphicon-triangle-right"></span>-->
        <a><span class="glyphicon glyphicon-info-sign"></span>
            How does this work?</a>
    </div>
    <div class="panel-body collapse">
        <p><strong>Step 1:</strong> Start by giving the tool a descriptive name and description by entering them
            in the tool's name and description fields. <strong>NOTE:</strong> both name and description fields are mandatory.</p>

        <p><strong>Step 2:</strong>: Once you have give your tool a name and description you can create as many sections as you please,
            simply by clicking on the [add image here] button. You can also delete sections by clicking on the delete section button [insert button image].
            As a guide, when you hover over the button the section to be removed will become highlighted so that you do not delete the wrong section by mistake.
            Each section has a name and a description. <strong>Only</strong> the section name is mandatory, but we recommend you give each
            section a description indicating its purpose.</p>

        <p><strong>Step 3:</strong>: After you have your sections all set up, you can add questions to any section by selecting the add new question button [add image].
            This allows you to set up your sections then add questions later if you choose. There is also a delete question button [add image] that you can use to remove
            any question at any time. By hovering your mouse over the button you can see the question highlighted.
        </p>

        <p><strong>Step 4:</strong>: Take a moment now to check that all the fields are correct and complete and correct them if they are not, then simply click [the save button].
            If you are successful you will be redirected to a list of all tools currently in existence and a green bar at the top of the page will confirm it has been saved.
        </p>

    </div>
</div>


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