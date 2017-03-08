<?php
/**
  * @var \App\View\AppView $this
  */
?>
<script>
</script>
<div class="row">

</div>

<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">Statistics (data depends user on role)</div>
        <div class="panel-body">
            <?= $this->Html->image('place_holders/stat_panel.PNG',
            ['class' => 'col-sm-4']) ?>
            <?= $this->Html->image('place_holders/stat_panel.PNG',
            ['class' => 'col-sm-4']) ?>
            <?= $this->Html->image('place_holders/stat_panel.PNG',
            ['class' => 'col-sm-4']) ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6 nopadding">
        <div class="panel panel-default">
            <div class="panel-heading">Clients Mamagement (Admin)</div>
            <div class="panel-body">

                <div class="col-sm-6">
                    <a href="<?= $this->Html->Url->build(
                        ['controller'=>'Clients', 'action'=>'add']
                    ) ?>" class="btn btn-primary square">
                    </a>
                </div>

                <div class="col-sm-6">
                    <div class="glyphicon glyphicon-plus-sign btn btn-primary btn-huge btn-lg btn-block"> Add New
                        Client
                    </div>
                </div>

                <div class="col-sm-6">
                    <a href="<?= $this->Html->Url->build(
                        ['controller'=>'Clients', 'action'=>'add']
                    ) ?>" class="btn btn-primary btn-lg square">
                        <div class="square-contents">
                            <span class="glyphicon glyphicon-plus-sign glyphicon-massive"
                        </div>
                    </a>
                </div>


            </div>
        </div>
    </div>

    <div class="col-sm-6 nopadding">
        <div class="panel panel-default">
            <div class="panel-heading">Clients Mamagement (Admin)</div>
            <div class="panel-body">
                <?= $this->Html->link(
                ' New Client',
                ['controller'=>'Clients', 'action'=>'add'],
                ['class' => 'btn btn-primary btn-block btn-huge glyphicon glyphicon-plus']
                ) ?>
                <?= $this->Html->link(
                ' List All Clients',
                ['controller'=>'Clients', 'action'=>'index'],
                ['class' => 'btn btn-primary btn-block btn-lg glyphicon glyphicon-plus']
                ) ?>
            </div>
        </div>
    </div>
</div>
