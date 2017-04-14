<?php $this->start('admin'); ?>

<ul class="nav navbar-nav">
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            Clients
            <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><?= $this->Html->link(
                'List All',
                ['controller' => 'Clients', 'action' => 'index']
                ) ?>
            </li>
            <li><?= $this->Html->link(
                'Create New',
                ['controller' => 'Clients', 'action' => 'add']
                ) ?>
            </li>
        </ul>
    </li>

    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            Users
            <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><?= $this->Html->link(
                'List All',
                ['controller' => 'Users', 'action' => 'index']
                ) ?>
            </li>
            <li><?= $this->Html->link(
                'Create New',
                ['controller' => 'Users', 'action' => 'add']
                ) ?>
            </li>
        </ul>
    </li>

    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            Participants
            <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><?= $this->Html->link(
                'List All',
                ['controller' => 'Participants', 'action' => 'index']
                ) ?>
            </li>
            <li><?= $this->Html->link(
                'Create New',
                ['controller' => 'Participants', 'action' => 'add']
                ) ?>
            </li>
        </ul>
    </li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            Sessions
            <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><?= $this->Html->link(
                'List All',
                ['controller' => 'Sessions', 'action' => 'index']
                ) ?>
            </li>
            <li><?= $this->Html->link(
                'Create New',
                ['controller' => 'Sessions', 'action' => 'add']
                ) ?>
            </li>
        </ul>
    </li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            Days
            <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><?= $this->Html->link(
                'List All',
                ['controller' => 'Days', 'action' => 'index']
                ) ?>
            </li>
            <li><?= $this->Html->link(
                'Create New',
                ['controller' => 'Days', 'action' => 'add']
                ) ?>
            </li>
        </ul>
    </li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            Runs
            <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><?= $this->Html->link(
                'List All',
                ['controller' => 'Runs', 'action' => 'index']
                ) ?>
            </li>
            <li><?= $this->Html->link(
                'Create New',
                ['controller' => 'Runs', 'action' => 'add']
                ) ?>
            </li>
        </ul>
    </li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            Observations
            <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><?= $this->Html->link(
                'List All',
                ['controller' => 'Observations', 'action' => 'index']
                ) ?>
            </li>
            <li><?= $this->Html->link(
                'Create New',
                ['controller' => 'Observations', 'action' => 'add']
                ) ?>
            </li>
        </ul>
    </li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            Results
            <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><?= $this->Html->link(
                'List All',
                ['controller' => 'Results', 'action' => 'index']
                ) ?>
            </li>
            <li><?= $this->Html->link(
                'Create New',
                ['controller' => 'Results', 'action' => 'add']
                ) ?>
            </li>
        </ul>
    </li>
</ul>
<?php $this->end(); ?>


<?php $this->start('client'); ?>
<ul class="nav navbar-nav">
    <li><?= $this->Html->link(__('Session history'), ['controller' => 'Sessions', 'action' => 'index']) ?></li>
    <li><?=$this->Html->link(__('logout'), ['controller' => 'Users', 'action' => 'logout']) ?> </li>
</ul>
<?php $this->end(); ?>


<?php $this->start('default'); ?>
<ul class="nav navbar-nav">
    <li><?= $this->Html->link(__('Help'), ['controller' => 'Sessions', 'action' => 'index']) ?></li>
</ul>
<?php $this->end(); ?>
