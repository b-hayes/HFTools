<?php
/**
 * @var \App\View\AppView $this
 */
?>


<!--    This is the info panel describing how to use this tool  -->

<div class="panel panel-info">
    <div class="panel panel-heading collapse-next" style="margin-bottom: 1px">
        <a><span class="glyphicon glyphicon-info-sign"></span>How does this work?</a>
    </div>
    <div class="panel-body collapse">
        <p><strong>Step 1:</strong> Start by giving the tool a name and description by entering them in the tool's name and description fields. <strong>NOTE:</strong> both name and description fields are mandatory.</p>

        <p><strong>Step 2:</strong> You can create as many sections as you please simply by clicking on the Add new section button <?= $this->Html->image("Add_new_section.png", array('class' => 'info-icons')); ?>
            You can also remove sections by clicking on the delete section button <?= $this->Html->image("delete_section.png", array('class' => 'info-icons')); ?>. As a guide, when you hover over the button the
            corresponding section to remove is highlighted so that you do not delete the wrong section by mistake. Each section has a name and a description. Only the section name is mandatory,
            but we recommend you give each section a description indicating its purpose.</p>

        <p><strong>Step 3:</strong> After you have your sections all set up, you can add questions to any section by selecting the Add new question button <?= $this->Html->image("add_new_question.png", array('class' => 'info-icons')); ?>.
            The add new question button allows you to set up your sections then add questions later if you choose. There is also a delete question button <?= $this->Html->image("delete_question.png", array('class' => 'info-icons')); ?>
            that you can use to remove any question at any time. By hovering your mouse over the button, you can see the question becomes highlighted to avoid mistakes.</p>

        <p><strong>Step 4:</strong> Take a moment now to check that all the fields are correct and complete, then simply click the Submit button <?= $this->Html->image("submit_tool.png", array('class' => 'info-icons submitBtnHeight')); ?>.
            If successful, the site directs you to a list of all tools currently in existence and a green bar at the top of the page is visible confirming that the site has saved the tool.</p>
    </div>
</div>



<?= $this->Form->create('Questionnaire') ?>
<fieldset>
    <legend><?= __('Create new Tool') ?></legend>

    <?= $this->Form->control('name', ['label' => 'Tool name']); ?>
    <?= $this->Form->control('description', ['label' => 'Tool description']); ?>

    <!-- the default inputs for a basic questionnaire -->
    <div id="sections">
        <div id="section0" section="0" class="section" questionCounter="0">

            <div class="panel panel-info">
                <div class="panel-heading">
                    <strong>Section</strong>
                </div>
            </div>

            <!-- Name and description of the section -->
            <?= $this->Form->control('section.0.name', ['label' => 'Section name']); ?>
            <?= $this->Form->control('section.0.description', ['label' => 'Section description']); ?>

            <!--     If no answer choice exists display option to create one otherwise display answer choice     -->
            <div id="buttonTypes">
                <?php if(empty($buttontypes->first())): ?>
                    <p>There does not appear to be any answer choices available <?= $this->Html->link(__('click here to create one'), ['controller' => 'Buttontypes', 'action' => 'create']) ?> </p>
                <?php else: ?>
                    <?= $this->Form->control('section.0.buttontype_id', ['options' => $buttontypes, 'label' => 'Answer choices']); ?>
                <?php endif; ?>
            </div>

            <!-- Question fields get added here when user selects add new question -->
            <table id="questions" class="form-control">
            </table>

            <Button class="add_question btn btn-info" type="Button"><span class="glyphicon glyphicon-plus"></span> Add new question</Button>
        </div>
    </div>

    <?= $this->Form->button(__('<span class="glyphicon glyphicon-floppy-disk"></span> Submit'), ['escapeTitle' => false]) ?>
    <?= $this->Form->end() ?>

    <!-- button to append more sections -->
    <Button id="add_section" type="Button"><span class="glyphicon glyphicon-plus"></span> Add new section</Button>
</fieldset>

<script>
    $(document).ready(function () {
        let sectionCounter = 0;

        // make a copy of the button type select options
        let typeList = $("#buttonTypes").clone();

        // adds a new field when the user clicks on add new question button.
        $(".add_question").click(AddQuestion);

        // append a new input when the user has clicked add new section button.
        $("#add_section").click(function () {
            sectionCounter++;

            //modify the details to match this section and question..
            $(typeList).find("select")
                .attr('name', 'section[' + sectionCounter + '][buttontype_id]')
                .attr('id', 'section-' + sectionCounter + '-buttontype-id');


            $("#sections").append(`
                <div id="section` + sectionCounter + `" class="section">

                </div>
            `);

            $("#section" + sectionCounter).append(`

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <strong>Section</strong>
                    </div>
                </div>

                <label for="section-` + sectionCounter + `-name" >Section</label>
                <input type="text" name="section[` + sectionCounter + `][name]">

                <label for="section-` + sectionCounter + `-description">Section Description</label>
                <input type="text" name="section[` + sectionCounter + `][description]">

                <answerChoice`+ sectionCounter + `></answerChoice`+ sectionCounter + `>

                <table>
                </table>

                <Button class="add_question btn btn-info" type="Button"><span class="glyphicon glyphicon-plus"></span> Add new question</Button>
                <button class="delete btn btn-danger pull-right" type="button"><span class="glyphicon glyphicon-trash"></span> Delete this section</button>
            `)
                // keep track of how many times a question is added for this specific section
                .attr("questionCounter", "0")
                //make sure add question button can find out what section it lives in
                .attr("section", sectionCounter);

            //add to the new section
            //$(NewSection).prepend(typeList);

            $(typeList).insertAfter('answerChoice' + sectionCounter);

            UpdateEventHandlers();
            scrollDown();
        });



        function AddQuestion() {
            //make sure we have the right section number
            var section = $(this).parent().attr("section");

            //Question counters are individual for each section
            let questionCounter = $(this).parent().attr("questionCounter");
            let questDiv = $(this).prev();

            //add elements to the question div
            $(questDiv)
                .append(`
                        <tr >
                            <td>
                                <div class="input text">
                                    <label for="section-` + section + `-question-` + section + `-text"><strong>Question</strong></label>
                                </div>
                            </td>
                            <td style="width: 100%">
                                <div class="input text">
                                    <input type="text" " name="section[`+ section +`][question][` + questionCounter + `][text]">
                                </div>
                            </td>
                            <td>
                                <button class="delete deleteQuestion btn btn-warning" type="button"><span class="glyphicon glyphicon-trash"></span> Delete</button>
                            </td>
                        </tr>
                `);

            //increment question counter for this section
            questionCounter++;

            $(this).parent().attr("questionCounter", questionCounter);

            UpdateEventHandlers();
            //scrollDown();
        }

        function DeleteMe() {
            if(confirm("Are your sure?")) {

                let deleteSelected = $(this).parent();

                if (deleteSelected.is('td')) {

                    deleteSelected.closest('tr').remove()
                } else {
                    deleteSelected.closest('.section').remove();
                }
            }
        }

        function scrollDown() {
            $("html, body").animate({ scrollTop: $(document).height() }, "slow");
        }

        function UpdateEventHandlers() {
            //Add question buttons
            $(".add_question").unbind("click").on("click", AddQuestion);

            // Delete buttons (questions and sections)
            $(".delete").unbind("click").on("click", DeleteMe);

            // delete buttons highlight what will be affected by the action
            $(".delete").hover(function() {
                    let highlightSelected = $(this).parent();

                    if (highlightSelected.is('td')) {
                        highlightSelected.closest('tr').css("background-color", "#ffccbe")
                    } else {
                        highlightSelected.closest('.section').css("background-color", "#ffccbe");
                    }
                },

                function() {
                    let highlightSelected = $(this).parent();

                    if (highlightSelected.is('td')) {
                        highlightSelected.closest('tr').css("background-color", "")
                    } else {
                        highlightSelected.closest('.section').css("background-color", "");
                    }
                });
        }

        UpdateEventHandlers()
    });
</script>