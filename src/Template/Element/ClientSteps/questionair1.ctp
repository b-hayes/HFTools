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
<form> page
    //it would take an array of $sections as a parameter
    function buildQuestionnaire($questionnaire){

    }

    //***NOT BEING USED NOW only here for possible future of database driven multiple questionnaires***
    //This function outputs html pannels containing many tables
    // It takes a multidimensional associative array as a parameter.
    // See just below the function for example of the parameter to pass in.
    function buildSection($section){
    echo "
    <div class='panel panel-info'>";
        echo "
        <div class='panel-heading'>" . $section['title'] . "</div>
        ";
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


        //using the other method now....

        $section = array(
        "title" => "2. Team Mental Models",
        "statement" => "Team Mental Models are “knowledge structures held by members of a team that enable them to form
        accurate explanations and expectations for the task, and in turn to coordinate their actions and adapt their
        behaviour to demands of the task and other team members.” (Hinsz, 1995, p.228). The following checklist has been
        used in emergency management situations to assist with after action reviews.",
        "questions" => array(
        //array of questions :
        array(
        "topic" => "Mental Models",
        "message" => "How well did team members perform their individual tasks?",
        "info" => "e.g. demonstrate that they knew the procedures needed for the type of event", //just comment out
        (dont set one) if you dont need it
        "values" => array(
        //using the same values specified in the table headers of our supplied sample document
        /*
        * NOTE!!! seems a bit odd that a high value was used to indicate a bad performance.
        * so low value is good but 0 means nothing still?
        * should this be changes to suit statistical overviews?
        * should not observeed store as null so it doesnt count instatistics?
        * */
        "to a limited extent" => "4",
        "to some extent" => "3",
        "to a good extent" => "2",
        "to a great extent" => "1",
        "not observed" => "0"
        )
        ),
        array(
        "topic" => "Mental Models",
        "message" => "How well did individual members execute their responsibilities in terms of using: ",
        //"info" => "",
        "values" => array(
        "to a limited extent" => "4",
        "to some extent" => "3",
        "to a good extent" => "2",
        "to a great extent" => "1",
        "not observed" => "0"
        ),
        "subs" => array( //**REMOVE THIS COMPLETELEY if there are no sub questions
        "• The relevant policies and procedures", //Part of the Question Key for result storage as well as the display
        text
        "• The information systems and technologies required)?"
        )
        ),
        array(
        "topic" => "Mental Models",
        "message" => "How well did the team share their understanding of what was needed with each other?",
        //"info" => "",
        "values" => array(
        "to a limited extent" => "4",
        "to some extent" => "3",
        "to a good extent" => "2",
        "to a great extent" => "1",
        "not observed" => "0"
        )
        ),
        array(
        "topic" => "Mental Models",
        "message" => "How well did individual team members anticipate the need to set up and operate new
        equipment/procedures/templates to accomplish team goals?",
        //"info" => "",
        "values" => array(
        "to a limited extent" => "4",
        "to some extent" => "3",
        "to a good extent" => "2",
        "to a great extent" => "1",
        "not observed" => "0"
        )
        ),
        array(
        "topic" => "Mental Models",
        "message" => "How well did people understand others’ roles during the event?",
        //"info" => "",
        "values" => array(
        "to a limited extent" => "4",
        "to some extent" => "3",
        "to a good extent" => "2",
        "to a great extent" => "1",
        "not observed" => "0"
        )
        ),
        array(
        "topic" => "Mental Models",
        "message" => "How well did the team share their understanding of their own and others roles as they managed the
        event?",
        //"info" => "",
        "values" => array(
        "to a limited extent" => "4",
        "to some extent" => "3",
        "to a good extent" => "2",
        "to a great extent" => "1",
        "not observed" => "0"
        )
        ),
        array(
        "topic" => "Mental Models",
        "message" => "How well did the team anticipate each other’s needs in managing the event actions?",
        //"info" => "",
        "values" => array(
        "to a limited extent" => "4",
        "to some extent" => "3",
        "to a good extent" => "2",
        "to a great extent" => "1",
        "not observed" => "0"
        )
        ),
        array(
        "topic" => "Mental Models",
        "message" => "How accurate were peoples’ understanding of their own roles during the action?",
        //"info" => "",
        "values" => array(
        "to a limited extent" => "4",
        "to some extent" => "3",
        "to a good extent" => "2",
        "to a great extent" => "1",
        "not observed" => "0"
        )
        ),
        array(
        "topic" => "Mental Models",
        "message" => "How close did the teams planning and anticipation match or mirror the problems that happened?",
        //"info" => "",
        "values" => array(
        "to a limited extent" => "4",
        "to some extent" => "3",
        "to a good extent" => "2",
        "to a great extent" => "1",
        "not observed" => "0"
        )
        ),
        array(
        "topic" => "Mental Models",
        "message" => "How well-coordinated did members perform their individual tasks?",
        //"info" => "",
        "values" => array(
        "to a limited extent" => "4",
        "to some extent" => "3",
        "to a good extent" => "2",
        "to a great extent" => "1",
        "not observed" => "0"
        )
        ),
        array(
        "topic" => "Mental Models",
        "message" => "How well did the team share their understanding of their own and others roles during the action?",
        //"info" => "",
        "values" => array(
        "to a limited extent" => "4",
        "to some extent" => "3",
        "to a good extent" => "2",
        "to a great extent" => "1",
        "not observed" => "0"
        )
        ),
        array(
        "topic" => "Mental Models",
        "message" => "How well were team members able to synchronise their actions in a timely manner?",
        //"info" => "",
        "values" => array(
        "to a limited extent" => "4",
        "to some extent" => "3",
        "to a good extent" => "2",
        "to a great extent" => "1",
        "not observed" => "0"
        )
        ),
        array(
        "topic" => "Mental Models",
        "message" => "Were there any unexpected surprises that reasonably could/should have been anticipated (reverse
        score)",
        //"info" => "",
        "values" => array(
        "to a limited extent" => "4",
        "to some extent" => "3",
        "to a good extent" => "2",
        "to a great extent" => "1",
        "not observed" => "0"
        )
        )
        )
        );
        buildSection($section);


        $section = array(
        "title" => "3. Behavioural Marker Systems",
        "statement" => "Behavioural Marker systems are essentially checklists that identify observable actions that
        individuals or teams should be employing to achieve their goals. The ‘systemic’ part of this is to take the
        results and feed them back into the management system – through revised training, procedures, policies and other
        controls.".
        "<br><br>Please rate the observer performance levels of the following tasks:",
        "questions" => array(
        array(
        "topic" => "PRE-BOARDING & BOARDING",
        "message" => "BOARDING: Gang-way condition, safety equipment present.",
        "info" => "Gang-way correctly rigged, all safety equipment present, prepared and in good condition.",
        "values" => array(
        //Display for the selection => value to submit with form
        "Observed performance had safety implications" => "1",
        "Observed performance was barely adequate" => "2",
        "Observed performance was effective" => "3",
        "Observed performance was truly noteworthy" => "4"
        )
        ),
        array(
        "topic" => "PRE-BOARDING & BOARDING",
        "message" => "BOARDING: Responsible officer greets pilot and escorts pilot to bridge.",
        "info" => "Appropriate greeting, officer has radio contact with bridge, escorts pilot quickly and safely to
        bridge.",
        "values" => array(
        //Display for the selection => value to submit with form
        "Observed performance had safety implications" => "1",
        "Observed performance was barely adequate" => "2",
        "Observed performance was effective" => "3",
        "Observed performance was truly noteworthy" => "4"
        )
        ),
        array(
        "topic" => "ARRIVAL AND PREPARATION",
        "message" => "INTRODUCTION OF PILOT: Captain is either introduced to the pilot or identifies himself to the
        pilot.",
        "info" => "Responsible Officer or Master announces the pilot’s arrival on the bridge .",
        "values" => array(
        //Display for the selection => value to submit with form
        "Observed performance had safety implications" => "1",
        "Observed performance was barely adequate" => "2",
        "Observed performance was effective" => "3",
        "Observed performance was truly noteworthy" => "4"
        )
        ),
        array(
        "topic" => "ARRIVAL AND PREPARATION",
        "message" => "MASTER-PILOT EXCHANGE: Ship information card is given to pilot.",
        "info" => "Ship information card is accurately prepared including documentation of ship defects, equipment
        status.",
        "values" => array(
        //Display for the selection => value to submit with form
        "Observed performance had safety implications" => "1",
        "Observed performance was barely adequate" => "2",
        "Observed performance was effective" => "3",
        "Observed performance was truly noteworthy" => "4"
        )
        ),
        array(
        "topic" => "ARRIVAL AND PREPARATION",
        "message" => "MASTER-PILOT EXCHANGE: Pilot is supplied with the Pilot Card.",
        "info" => "Pilot card is accurate and remains with pilot during pilotage.",
        "values" => array(
        //Display for the selection => value to submit with form
        "Observed performance had safety implications" => "1",
        "Observed performance was barely adequate" => "2",
        "Observed performance was effective" => "3",
        "Observed performance was truly noteworthy" => "4"
        )
        ),
        array(
        "topic" => "ARRIVAL AND PREPARATION",
        "message" => "MASTER-PILOT EXCHANGE: Crew member sets up parallel indexing if/when requested.",
        "info" => "Parallel indexing competently and quickly set up.",
        "values" => array(
        //Display for the selection => value to submit with form
        "Observed performance had safety implications" => "1",
        "Observed performance was barely adequate" => "2",
        "Observed performance was effective" => "3",
        "Observed performance was truly noteworthy" => "4"
        )
        ),
        array(
        "topic" => "ARRIVAL AND PREPARATION",
        "message" => "BRIEFING: Pilot and Crew discuss and agree on passage plan.",
        "info" => "Is agreement reached? Shared understanding about plans? “Everyone on same page” (Including discussing
        tug arrangements).",
        "values" => array(
        //Display for the selection => value to submit with form
        "Observed performance had safety implications" => "1",
        "Observed performance was barely adequate" => "2",
        "Observed performance was effective" => "3",
        "Observed performance was truly noteworthy" => "4"
        )
        ),
        array(
        "topic" => "ARRIVAL AND PREPARATION",
        "message" => "CONTINGENCY MANAGEMENT: Pilot and crew discuss and agree on effective strategies to manage
        unintended consequences.",
        "info" => "Threats and consequences anticipated and available resources used to manage threat.",
        "values" => array(
        //Display for the selection => value to submit with form
        "Observed performance had safety implications" => "1",
        "Observed performance was barely adequate" => "2",
        "Observed performance was effective" => "3",
        "Observed performance was truly noteworthy" => "4"
        )
        )
        )
        );
        buildSection($section);
        ?>
        <div class="row">
            <input class="btn btn-primary btn-huge pull-right" type="submit" value="Save Observation">
        </div>
    </form>
