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
        <p>Answer choices are created so that they may be used in conjunction with a Tool that allows for the custom Tools to also have custom answers. Typically, these are multiple choice questions like What is the weather like outside Cold, warm, hot?</p>

        <p><strong>Step 1:</strong> Give your answer choice a name. The name is what is visible when choosing one during the custom tool creation.</p>

        <p><strong>Step 2:</strong> Click the Add new choice button. Two text fields appear.  On the left, with the text label 'Answer user can select' write what you want the user to be presented with when choosing their response. For example, 'what is the weather like' hot, warm, cold? Hot, warm and cold would be the labels. </p>

        <p><strong>Step 3:</strong> To the right of  'Answer user can select.'  is the text field labelled 'Value stored' this is for cases when choice selections have values associated with them. For example, cold = 1, warm = 2, hot = 3. In this instance, all we care about the value, not what the user sees. NOTE: You need to fill out the value stored, even if the label to the left is the same as the value you wish to store.
        </p>

        <p><strong>Step 4:</strong> To delete answer choices, simply select and click the delete button to the far right of the row.
        </p>

        <p><strong>Step 5:</strong> To save the answer choices so that they may be used at a later date, simply click on the save button..
        </p>
    </div>
</div>


<?= $this->Form->create('Buttontype') ?>

<fieldset>
    <legend><?= __('Answer Choices') ?></legend>
    <?php
    // name and description of this questionnaire being created
    echo $this->Form->control('text', ['label' => 'Name']);
    echo $this->Form->control('type', ['options' => ['multipleChoice' => 'Multiple Choice', 'commentBox' => 'Comment Box']]);
    ?>

    <hr>
    <h4>Enter answer choices</h4>
    <table id="buttonvalues" class="" style="width: 100%">
    </table>

    <?= $this->Form->button(__('<span class="glyphicon glyphicon-floppy-disk"></span> Save'), ['escapeTitle' => false]) ?>
    <?= $this->Form->end() ?>

    <!-- button to append more sections -->
    <Button id="add_buttonvalue" type="Button">
        <span class="glyphicon glyphicon-plus"></span> Add New Choice
    </Button>
</fieldset>

<script>
    $(document).ready(function () {
        let buttonValuteCounter = 0;

        // append a new input when the user has clicked add new section button.
        $("#add_buttonvalue").click(function () {
            buttonValuteCounter++;

            $("#buttonvalues").append(`
                <tr id="buttonvalues` + buttonValuteCounter + `" class='sections'>
                </tr>
            `);

            let NewSection = $("#buttonvalues" + buttonValuteCounter)
                    .append(`
                        <td>
                            <input class="radio" type="radio" disabled="disabled">
                        </td>
                    `)
                    .append(`
                        <td>
                            <div class="">
                                <label for="buttonvalues-` + buttonValuteCounter + `-text_label" >Answer user can select</label>
                                <input type="text"" name="buttonvalues[` + buttonValuteCounter + `][text_label]">
                            </div>
                        </td>
                    `)
                    .append(`
                        <td>
                            <div class="input text">
                                <label for="buttonvalues-' + buttonValuteCounter + '-text_value">Value stored</label>
                                <input type="text" name="buttonvalues[` + buttonValuteCounter + `][text_value]">
                            </div>
                        </td>
                    `)
                    // keep track of how many times a question is added for this specific section
                    .append(`
                        <td>
                            <button class="delete btn btn-danger" type="button">
                                <span class="glyphicon glyphicon-trash"></span> Delete
                            </button>
                        </td>
                    `);

            // make a copy of the button type select options
            let typeList = $("#buttonTypes").clone();

            //make sure add question button can find out what section it lives in
            NewSection.attr("sections", buttonValuteCounter);

            UpdateEventHandlers();
            scrollDown();
        });

        function DeleteMe() {
            if(confirm("Are your sure?")){
                $(this).parent().parent().remove();
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
                $(this).parent().parent().css("background-color", "#ffccbe");

            }, function(){
                $(this).parent().parent().css("background-color", "");
            });
        }
    });
</script>