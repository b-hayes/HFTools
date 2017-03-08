<h3>Start a Run</h3>
<p class="info">Each run will can contain many observations. Please give a name and description for the
    next run. eg. Run #1 | Pilot tests & Boarding procedures.</p>
<P class="warning">A run will remain open untill you close it. If you have someone else who is also
    making observations they will automatically be saved to this run. Whoever conducts the last observation
    should close the run.</P>
<div class="panel panel-info">
    <div class="panel-heading">Start new Run</div>
    <div class="panel-body">
        <div class="row">
            <?= $this->requestAction(
            array('controller'=>'Runs','action'=>'add')
            ) ?>
        </div>
    </div>
</div>
