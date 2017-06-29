<?php
/**
 * @var \App\View\AppView $this
 */
?>
<?= $this->Form->create('Questionnaire') ?>
<fieldset>
    <legend><?= __('Create new questionnaire') ?></legend>
    <?php
    // name and description of this questionnaire being created
    echo $this->Form->control('name', ['label' => 'Questionnaire name']);
    echo $this->Form->control('description', ['label' => 'Questionnaire description']);
    ?>

    <!-- the default inputs for a basic questionnaire -->
    <div id="sections">
        <div id="section0" section="0" class="section" questionCounter="0">
        <?php
        // name and description of the section
        echo $this->Form->control('section.0.name', ['label' => 'Section name']);
        echo $this->Form->control('section.0.description', ['label' => 'Section description']);
        // section.0.question.0.description
        ?>
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
        var sectionCounter = 0;

        // adds a new field when the user clicks on add new question button.
        $(".add_question").click(AddQuestion);

        // append a new input when the user has clicked add new section button.
        $("#add_section").click(function () {
            sectionCounter++;
            $("#sections").append("<div id='section" + sectionCounter + "' class='section'></div>");
            var NewSection =
            $("#section" + sectionCounter).append("<label for='section-" + sectionCounter + "-name' >Section</label>")
                .append("<input type='text' name='section[" + sectionCounter + "][name]'>")
                .append("<label for='section-" + sectionCounter + "-description'>Section Description</label>")
                .append("<input type='text' name='section[" + sectionCounter + "][description]'>")
            // keep track of how many times a question is added for this specific section
                .attr("questionCounter", "0")
                .append('<Button class="add_question btn btn-info" type="Button"><span class="glyphicon glyphicon-plus"></span> Add new question</Button>')
                .append("<button class='delete btn btn-danger pull-right' type='button'><span class='glyphicon glyphicon-trash'></span> Delete this section</button>");

            //make sure add question button can find out what section it lives in
            $("#section" + sectionCounter).attr("section", sectionCounter);

            UpdateEventHandlers();
            scrollDown();
        });

        function AddQuestion() {
            //make sure we have the right section number
            var section = $(this).parent().attr("section");
            //Question counters are individual for each section
            var questionCounter = $(this).parent().attr("questionCounter");

            //add div to contain question and its buttons
            $(this).before("<div class='question'" + questionCounter + "><div>");
            var questDiv = $(this).prev();

            //add elements to the question div
            $(questDiv)
                .append("<button class='delete deleteQuestion btn btn-warning' type='button'><span class='glyphicon glyphicon-trash'></span> Delete Question</button>")
                .append("<label for='section-" + section + "-question-" + section + "-text' >Question</label>")
                .append("<input type='text' name='section["+ section +"][question]["+ questionCounter+"][text]'>");

            UpdateEventHandlers();
            scrollDown();

            //increment question counter for this section
            questionCounter++;
            $(this).parent().attr("questionCounter", questionCounter);
        }

        function DeleteMe() {
            if(confirm("Are your sure?")){
                $(this).parent().remove();
            }
        }

        function scrollDown() {
            $("html, body").animate({ scrollTop: $(document).height() }, "slow");
        }

        function UpdateEventHandlers() {
            //Add question buttons
            $(".add_question").unbind("click").on("click", AddQuestion);

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