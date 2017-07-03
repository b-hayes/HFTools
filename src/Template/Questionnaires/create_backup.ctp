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
        <div id="section0" class="section">
        <?php
        // name and description of the section
        echo $this->Form->control('section.0.name', ['label' => 'Section name']);
        echo $this->Form->control('section.0.description', ['label' => 'Section description']);
        // section.0.question.0.description
        ?>
            <Button id="add_question" type="Button">Add new question</Button>
        </div>
    </div>

    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>

    <!-- buttons to append more sections or questions for a section-->
    <Button id="add_section" type="Button">Add new section</Button>
    <Button id="add_question" type="Button">Add new question</Button>
</fieldset>

<!--    TODO this should be in a script file under webroot/js and called here -->
<script>
    $(document).ready(function () {
        /* the two counters are used to inject an index into the field name, this creates an array which is sent in the
         * post request so that it can be handled in the backend */
        var sectionCounter = 0;
        var questionCounter = 0;

        function scrollDown() {
            $("html, body").animate({ scrollTop: $(document).height() }, "slow");
        }

        // append a new input when the user has clicked add new section button.
        $("#add_section").click(function () {
            sectionCounter++;
            $("#sections").append("<div id='section" + sectionCounter + "' class='section'></div>");

            $("#section" + sectionCounter).append("<label for='section-" + sectionCounter + "-name' >Section</label>")
                .append("<input type='text' name='section[" + sectionCounter + "][name]'>")
                .append("<label for='section-" + sectionCounter + "-description'>Section Description</label>")
                .append("<input type='text' name='section[" + sectionCounter + "][description]'>");

            // want to restart the counter to count the number of questions inside a section.
            questionCounter = 0;
            scrollDown();
        });

        // adds a new field when the user clicks on add new question button.
        $("#add_question").click(function () {
            $(this).before("<div class='question'" + questionCounter + "><div>");
            var questDiv = $(this).prev();

            $(questDiv)
                .append("<button class='deleteQuestion btn btn-danger' type='button'><span class='glyphicon glyphicon-trash'></span> </button>")
                .append("<label for='section-" + sectionCounter + "-question-" + sectionCounter + "-text' >Question</label>")
                .append("<input type='text' name='section["+ sectionCounter +"][question]["+ questionCounter+"][text]'>");
            //set the input box as focus so they can type
            $(this).prev().children("input").focus();

            //have to use .on method since the button didn't exist until now.
            //also have to unbind each time as older qwuestions will get reassigned by this as well
            $(".deleteQuestion").unbind("click").on("click", function(){
                if(confirm("Are your sure you want to delete this question?")){
                    $(this).parent().remove();
                }
            });

            questionCounter++;

            scrollDown();
        });

        function deleteMyParent() {
            alert("delete button clicked");
            var P = $(this).parent();
            P.remove();
        }

    });
</script>