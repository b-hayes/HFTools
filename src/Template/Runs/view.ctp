<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Run $run
  */

?>

<!--- session stuffs --->
<h2><?= h('Session name: ' . $run->session->name) ?></h2>
<h3><?= h('Description: ' . $run->session->description) ?></h3>


<div class="panel panel-info">
    <div class="panel-heading">
        <div class="row">
            <h5 class="col-md-4"><?= '<strong>Name of run: </strong> ' . h($run->name); ?></h5>
            <h6 class="col-md-4"><?= '<strong>Description of run: </strong> ' . h($run->description) ?></h6>
            <h6 class="col-md-4"><?= '<strong>Date run was conducted: </strong> ' . h($run->run_date) ?></h6>
        </div>
    </div>

    <div class="panel-body">
        <div class="panel-group">
            <?php foreach($run->observations as $observations): ?>
                <div class="section-in-panel clearfix">
                    <?= h($observations->observer_id) . ' <strong> observed </strong>  ' . h($observations->participant->full_name)?>
                    <?= $this->Html->link(__('<button class="btn btn-default pull-right">see results <span class="glyphicon glyphicon-chevron-right"></span></button>'), ['controller' => 'observations', 'action' => 'view', $observations->id],
                        ['escapeTitle' => false]) ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>


