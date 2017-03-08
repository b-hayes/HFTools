<!-- Client Home Panels -->
<?php
//session_destroy();
//Tracking the guided steps of client user interactions
if(!isset($_SESSION['step'])){
    $_SESSION['step']=0;
}
//increment step
$_SESSION['step'] += 1;
$step = $_SESSION['step'];

if($step > 6){
$_SESSION['step'] = $step = 1;
}
//$step=6;   //use to lock at a specific step for testing
?>
<h1><?= $step ?></h1>


<div class="row">
    <div class="col-sm-12">
        <div class="panel-group">
            <?= $this->Element('ClientSteps/step_' . $step) ?>
        </div>
    </div>
</div>
