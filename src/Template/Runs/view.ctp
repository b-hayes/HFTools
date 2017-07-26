<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Run $run
  */

?>


<script>

        function printlayer(layer) {

            var content = document.getElementById(layer);
            var pri = document.getElementById("ifmcontentstoprint").contentWindow;
            pri.document.open();
            pri.document.write(content.outerHTML);
            pri.document.close();
            pri.focus();
            pri.print();

//            var generator = window.open(",'name,");
//            var layertext = document.getElementById(layer);
//
//            strHtml.append(layertext).append(`</body></html>`);
//
//            generator.document.write(strHtml);
//            generator.document.close();
//            generator.print();
//            generator.close();
        }

</script>

<iframe id="ifmcontentstoprint" style="height: 0px; width: 0px; position: absolute">

</iframe>


<div id="div-id-name">
    <!--- session stuffs --->
    <h2><?= h('Session name: ' . $run->session->name) ?></h2>
    <h3><?= h('Description: ' . $run->session->description) ?></h3>


    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="row">
                <h5 class="col-md-4"><?= '<strong>Name of run: </strong> ' . h($run->name); ?></h5>
                <h6 class="col-md-4"><?= '<strong>Description of run: </strong> ' . h($run->description) ?></h6>
                <h6 class="col-md-4"><?= '<strong>Date run was conducted: </strong> ' . h($run->run_date->nice()) ?></h6>
            </div>
        </div>
    </div>

    <div class="panel-body">
        <div class="panel-group">
            <?php foreach($run->observations as $observations): ?>
                <div class="section-in-panel clearfix">
                    <?= h($observations->observer->full_name) . ' <strong> observed </strong>  ' . h($observations->participant->full_name)?>
                    <?= $this->Html->link(__('<button class="btn btn-default pull-right">see results <span class="glyphicon glyphicon-chevron-right"></span></button>'), ['controller' => 'observations', 'action' => 'view', $observations->id],
                        ['escapeTitle' => false]) ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?= $this->Html->link(__('Create New Observation'), ['controller' => 'users', 'action' => 'home'], ['class' => 'btn btn-info']) ?>
    <?= $this->Html->link(__('<span class="glyphicon glyphicon-print"></span> Print all Observation results for this run...'),
        ['controller' => 'runs', 'action' => 'printable', h($run->id)], ['class' => 'btn btn-info', 'escapeTitle' => false]) ?>
</div>


