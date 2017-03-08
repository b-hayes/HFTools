<h3>Create a Session.</h3>
<p class="info">A session covers all the days that you will be using the facilities. Eg. if you are
    using the facilities for the next 5 days you would set the end date to be 5 days from now.</p>
<div class="panel panel-info">
    <div class="panel-heading">Begin Session</div>
    <div class="panel-body">
        <?= $this->requestAction(
        array('controller'=>'Sessions','action'=>'add')
        ) ?>
    </div>
</div>
