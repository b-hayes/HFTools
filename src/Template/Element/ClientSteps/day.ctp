<h3>Begin your Day</h3>
<p class="info">At the beginning of each day of your session, you will be asked to enter a name for
    all of the runs you will cunduct throughout the day.</p>
<div class="panel panel-info">
    <div class="panel-heading">Please enter a name or short note for all of todays runs?</div>
    <div class="panel-body">

        <?= $this->requestAction(
        array('controller'=>'Days','action'=>'add')
        ) ?>
    </div>
</div>
