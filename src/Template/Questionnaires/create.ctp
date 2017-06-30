<?php
/**
 * @var \App\View\AppView $this
 */
?>
<?= $this->Form->create('Questionnaire') ?>
<h1>Testing info pannels</h1>
<div class="panel panel-info">
    <div class="panel panel-heading collapse-next" style="margin-bottom: 1px">
        <span class="glyphicon glyphicon-info-sign"></span>
        Did you know you can eat cheese on crackers?
    </div>
    <div class="panel-body">
        Yes, bruschetta is the equivalent of Italian salsa, but when done right, it's a bright medley that makes you forget you'll be reeking of garlic and onion for the rest of the afternoon.

        Dice 2 large tomatoes, ¼ red onion, and 1 clove garlic, and slice a handful of basil into ribbons. Mix all the ingredients together with 1 tablespoon of extra virgin olive oil and a pinch of salt, leaving ¼ of the basil aside for garnish. Spoon the mixture onto the cracker and garnish with the remaining basil.
    </div>
</div>
<span class="glyphicon glyphicon-info-sign collapse-next"></span>
<div class="panel panel-info">
    <div class="panel panel-heading">
        Did you know you can eat cheese on crackers?
    </div>
    <div class="panel-body">
        Yes, bruschetta is the equivalent of Italian salsa, but when done right, it's a bright medley that makes you forget you'll be reeking of garlic and onion for the rest of the afternoon.

        Dice 2 large tomatoes, ¼ red onion, and 1 clove garlic, and slice a handful of basil into ribbons. Mix all the ingredients together with 1 tablespoon of extra virgin olive oil and a pinch of salt, leaving ¼ of the basil aside for garnish. Spoon the mixture onto the cracker and garnish with the remaining basil.
    </div>
</div>

<div class="alert-info" style="margin-bottom: 5px">
    <a class="collapse-next">
    <span class="glyphicon glyphicon-info-sign"></span>
    Did you know you can eat cheese on crackers?
    </a>
    <div class="panel panel-info" style="padding: 10px">
        Yes, bruschetta is the equivalent of Italian salsa, but when done right, it's a bright medley that makes you forget you'll be reeking of garlic and onion for the rest of the afternoon.

        Dice 2 large tomatoes, ¼ red onion, and 1 clove garlic, and slice a handful of basil into ribbons. Mix all the ingredients together with 1 tablespoon of extra virgin olive oil and a pinch of salt, leaving ¼ of the basil aside for garnish. Spoon the mixture onto the cracker and garnish with the remaining basil.
    </div class="panel panel-info" style="padding: 10px">
</div>


<span class="glyphicon glyphicon-info-sign btn btn-info collapse-next" style="float: left; margin-right: 5px;"></span>
<div class="panel panel-info">
    <div class="panel-heading">
        Did you know you can eat cheese on crackers?
    </div>
    <div class="panel-body">
        Yes, bruschetta is the equivalent of Italian salsa, but when done right, it's a bright medley that makes you forget you'll be reeking of garlic and onion for the rest of the afternoon.

        Dice 2 large tomatoes, ¼ red onion, and 1 clove garlic, and slice a handful of basil into ribbons. Mix all the ingredients together with 1 tablespoon of extra virgin olive oil and a pinch of salt, leaving ¼ of the basil aside for garnish. Spoon the mixture onto the cracker and garnish with the remaining basil.
    </div>
</div>

<div style="position: absolute; top: 0; right: 0;">
    <span class="glyphicon glyphicon-question-sign btn btn-info collapse-next" style="float: right; margin-right: 5px;"></span>
    <div class="panel panel-info" style="width: 500px; display: none;">
        <div class="panel-heading">
            Did you know you can eat cheese on crackers?
        </div>
        <div class="panel-body">
        Yes, bruschetta is the equivalent of Italian salsa, but when done right, it's a bright medley that makes you forget you'll be reeking of garlic and onion for the rest of the afternoon.

        Dice 2 large tomatoes, ¼ red onion, and 1 clove garlic, and slice a handful of basil into ribbons. Mix all the ingredients together with 1 tablespoon of extra virgin olive oil and a pinch of salt, leaving ¼ of the basil aside for garnish. Spoon the mixture onto the cracker and garnish with the remaining basil.
        </div>
    </div>
</div>


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
            <a class="btn btn-info collapse-next" >Question style..</a>
            <div style="display: none">

                <div class="col-md-3 panel panel-default">
                    <div class="panel-heading">Liket Scale</div>
                    <div class="panel-body">
                        <img style="width: 100%" src="data:image/png;base64,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">
                    </div>
                </div>
                <div class="col-md-3 panel panel-default">
                    <div class="panel-heading">Text Answers</div>
                    <div class="panel-body">
                        <img style="width: 100%" src="data:image/png;base64,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">
                    </div>
                </div>
            </div>
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