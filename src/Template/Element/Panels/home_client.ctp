<!-- Client Home Panels -->
<?php
//session_destroy();
//choose the apropriate step for the client to be at... (changes panel to display)
$current_session = $this->request->session()->read('Current.session');
$step="session";
if($current_session != null) $step = "day";
$current_day = $this->request->session()->read('Current.day');
if($current_day != null) $step = "run";
$current_run = $this->request->session()->read('Current.run');
if($current_run != null) $step = "observation";

//$step = "day"; //use this for locking in a particular step for testing
?>


<div class="panel-group">
    <!--        <div class="row">-->
    <!--            <div class="btn btn-primary btn-arrow-indicator">Where your up to :</div>-->
    <!--            <button type="button" class="btn btn-success btn-arrow-right">-->
    <!--                Session: --><?//= $current_session['name'] ?>
    <!--            </button>-->
    <!--            <button type="button" class="btn btn-success btn-arrow-right">-->
    <!--                Day: --><?//= $current_day['name'] ?>
    <!--            </button>-->
    <!--            <button type="button" class="btn btn-primary btn-arrow-right">-->
    <!--                Run: --><?//= $current_run['name'] ?>
    <!--            </button>-->
    <!--            <button type="button" class="btn btn-info btn-arrow-right">Observation</button>-->
    <!--        </div>-->
    <?= $this->Element('ClientSteps/' . $step) ?>
</div>
