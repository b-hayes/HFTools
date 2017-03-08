<!-- Admin Home Panels -->

<div class="row">

    <div class="col-sm-6 nopadding">
        <div class="panel panel-default">
            <div class="panel-heading">Clients Mamagement (Admin)</div>
            <div class="panel-body">
                <?= $this->Html->link(
                ' Add new Client',
                ['controller'=>'Clients', 'action'=>'add'],
                ['class' => 'btn btn-primary btn-block btn-huge glyphicon glyphicon-plus']
                ) ?>

                <?= $this->Html->link(
                ' Manage all Clients',
                ['controller'=>'Clients', 'action'=>'index'],
                ['class' => 'btn btn-primary btn-block btn-huge glyphicon glyphicon-list']
                ) ?>

            </div>
        </div>
    </div>


    <div class="col-sm-6 nopadding">
        <div class="panel panel-default">
            <div class="panel-heading">Users Mamagement (Admin)</div>
            <div class="panel-body">
                <?= $this->Html->link(
                ' Add new User',
                ['controller'=>'Users', 'action'=>'add'],
                ['class' => 'btn btn-primary btn-block btn-huge glyphicon glyphicon-plus']
                ) ?>

                <?= $this->Html->link(
                ' Manage all Users',
                ['controller'=>'Users', 'action'=>'index'],
                ['class' => 'btn btn-primary btn-block btn-huge glyphicon glyphicon-list']
                ) ?>

            </div>
        </div>
    </div>
