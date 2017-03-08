<h3>Make Observations</h3>
<p class="info">Observations are made by filling out questionnaires to rate a participants performance
    duing an exercise. An observation contains all the results from filling out a questionnaire.</p>
<div class="panel panel-info">
    <div class="panel-heading">Observations for run :
        <?= $this->request->session()->read('Current.run.name') ?> .
    </div>
    <div class="panel-body">

        <?= $this->requestAction(
        array('controller'=>'Observations','action'=>'index')
        ) ?>
        <?= $this->Html->link(
        ' Close the Run',
        ['controller'=>'Runs', 'action'=>'close'],
        ['class' => 'btn btn-warning btn-huge glyphicon glyphicon-pushpin pull-left']
        ) ?>
        <?= $this->Html->link(
        ' Make Observation',
        ['controller'=>'Observations', 'action'=>'add'],
        ['class' => 'btn btn-primary btn-huge glyphicon glyphicon-plus pull-right']
        ) ?>
    </div>
</div>
