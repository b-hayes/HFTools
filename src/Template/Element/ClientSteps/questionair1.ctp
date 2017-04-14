<?php
//EXAMPLE SYNTAX for building a section and a question on the page
//section creates a pannel
//question creates a table of selectable values that a form can submit
$section = array(
    "title" => "DISPLAYS_IN_PANNEL_HEADING",
"statement" => "DISPLAYS_IN_PANEL_BODY_BEFORE_QUESTIONS_START",
"questions" => array(
//array of questions, each question is also an array, with more arrays inside for values and sub questions
array(
"topic" => "NOT_DISPLAYED_BUTBECOMES_PART_OF_QUESTION_KEY",
"message" => "THE_QUESTION_TEXT_DISPLAYED",
"info" => "DISPLAYS_DIRECTLY_UNDER_QUESTION_TEXT", //OPTIONAL: just comment out (dont set one) if you dont need it
"values" => array(
//Display for the selection => value to submit with form
"Strongly disagree" => "-2",
"Disagree" => "-1",
"Neutral" => "0",
"Agree" => "1",
"Strongly Agree" => "2"
),
"subs" => array( //completely remove subs array if there are no sub questions
"DISPLAY_AND_IS",
"PART_OF_QUESTION_KEY",
"THESE_MUST_ALL",
"BE_UNIQUE"
)
)
)
);


//This function is only prototyped with the intention of possibly building an entire

//it would take an array of $sections as a parameter
function buildQuestionnaire($questionnaire){

}

//***NOT BEING USED NOW only here for possible future of database driven multiple questionnaires***
//This function outputs html pannels containing many tables
// It takes a multidimensional associative array as a parameter.
// See just below the function for example of the parameter to pass in.
function buildSection($section) {
echo "
<div class='panel panel-info'>";
    echo " <div class='panel-heading'>" . $section['title'] . "</div> ";
    echo "
    <div class='panel-body'>";
        //display the opening statement for this section of questions
        echo "<p class='Question-Section-Statement'>" . $section['statement'] . "</p>";

        //now output each question with its asnwerables..
        foreach ($section['questions'] as $question){
        buildQuestion($question);
        }

        echo "
    </div>
    "; //closing tag for panel-body
    echo "
</div>
"; //closing tag for panel
$_SESSION['section']=$section;
}
//example parameter value for buildSection($section)
$section = array(
"title" => "???",
"statement" => "???",
"questions" => array(
//array of questions : see buildQuestion($question) function for details.
)
);


// This function is for outputting html tables with the same format each time its called.
// It takes a multidimensional associative array as a parameter.
function buildQuestion($question) {

echo "
<div class='Question'>";
    echo "<h4>" . $question['message'] ."</h4>";
    if(isset($question['info'])){
    echo "<p class='Question-info'>". $question['info'] . "</p>";
    }
    echo "
    <table>";

        //$question['subs'] should not be set at all if there are no subquestions
        if(isset($question['subs'])){
        buildSubs($question);
        } else {
        //no sub questions just build one question
        echo "
        <tr>";
            foreach ($question['values'] as $display => $value){
            $iName = $question['topic'];
            echo "
            <td>" .
                "<input type='radio' name='$iName' value='$value'>" .
                "<p>$display</p>" .
                "
            </td>
            ";
            }
            echo "
        </tr>
        ";
        }


        echo "
    </table>
</div>
<br><br>";
}


//separated the build even more to handle diffent styles of output
function buildSubs($question){
//first row is headers for value selections (strongly agree etc)
echo "
<tr>";
    echo "
    <th></th>
    "; //empty th as its not above the actual value selectors its above the sub question names
    foreach ($question['values'] as $display => $value){
    echo "
    <th>$display</th>
    ";
    }
    echo "
</tr>
";

//now all rows for sub-questions or "subs"...
foreach ($question['subs'] as $sub){
echo "
<tr class='subQuestion'>";//start a row for each sub question
    echo "
    <td class=''><p>$sub</p></td>
    ";
    //now make a td with radio option for each possible value of the subquetion
    foreach ($question['values'] as $display => $value){
    $iName = $question['topic'] . " : " . $sub;
    echo "
    <td><input type='radio' name='$iName' value='$value'></td>
    ";
    }
    echo "
</tr>
";//close off the table row
}
}


function startSection($title)
{
echo "
<div class='panel panel-info'>";
    echo "
    <div class='panel-heading'>" . $title . "</div>
    ";
    echo "
    <div class='panel-body'>";
        }

        function closeSection(){
        echo "
    </div>
    "; //closing tag for panel-body
    echo "
</div>
"; //closing tag for panel
}

?>

<h3>Making Observation Results with Questionare</h3>


<form>

    <?php
startSection("1.	Joint Activity Assessment");

echo "<p>" .
    "When people have a common goal and their actions are interdependent, they have to coordinate to reach that goal
    (Clark, 1996). This is exactly the task that confronts teams moving ships around ports and bridge teams. This
    work is currently part of the doctoral research of Joakim Mansson and been applied in the development of a new
    PPU concept that was tested in the AMC full-mission simulator." .
    "</p>";

    $question = array(
    "topic" => "Communication",
    "message" => "1. The communication changed, in regards to the following: ",
    "values" => array(
    "Strongly disagree" => "-2",
    "Disagree" => "-1",
    "Neutral" => "0",
    "Agree" => "1",
    "Strongly Agree" => "2"
    ),
    "subs" => array(
    "More goal oriented",
    "Less repetition",
    "Less clarifications",
    "Fewer missunderstandings",
    "Quicker"
    )
    );
    buildQuestion($question);

    $question = array(
    "topic" => "Coordination",
    "message" => "2. The coordination changed, in regards to the following:",
    "values" => array(
    "Strongly disagree" => "-2",
    "Disagree" => "-1",
    "Neutral" => "0",
    "Agree" => "1",
    "Strongly Agree" => "2"
    ),
    "subs" => array(
    "Fewer mistakes",
    "More efficient",
    "Less memory load",
    "Increased predictability",
    "Better overview"
    )
    );
    buildQuestion($question);

    $question = array(
    "topic" => "Collaboration",
    "message" => "3. The joint activity changed, in regards to the following",
    "values" => array(
    "Strongly disagree" => "-2",
    "Disagree" => "-1",
    "Neutral" => "0",
    "Agree" => "1",
    "Strongly Agree" => "2"
    ),
    "subs" => array(
    "Better team work",
    "Enhanced joint awareness",
    "Improved goal alignment",
    "Increased team trust",
    "Safer operation"
    )
    );
    buildQuestion($question);

    closeSection();
?>

    <div class="row">
        <input class="btn btn-primary btn-huge pull-right" type="submit" value="Save Observation">
    </div>
</form>
