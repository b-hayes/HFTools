<?php $this->start('top_nav'); ?>

<div class="container-fluid nav navbar">
    <div class="">
        <?php  echo $this->Html->image("AMCSBanner2016_Trim.png", array('class' => 'logo-image')); ?>
    </div>
    <ul class="nav navbar-nav pull-right">
        <!-- this if condition checks if a user has an active session. If they do then we display navigation -->
        <?php if ($this->request->session()->read('Auth')): ?>
            <li><a href=""><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
            <li><a href="/~hftools/hftools/users/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            <!-- otherwise there is no current session and so we should show them the login button -->
        <?php else: ?>
            <li><a href="#"><span class="glyphicon glyphicon-envelope"></span> Contact Us</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        <?php endif; ?>
    </ul>
</div>

<?php $this->end(); ?>

<?php $this->start('side_nav'); ?>
    <button class=" btn-block collapse-next">Accounts</button>
    <div class="panel collapse">
        <ul class="nav nav-pills nav-stacked">
            <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?></li>
            <li class="tab"><?= $this->Html->link(__('List Clients Login Accounts'), ['controller' => 'Users', 'action' => 'index']) ?></li>
            <hr>
            <li><?= $this->Html->link(__('Create New Client'), ['controller' => 'Clients', 'action' => 'add']) ?></li>
            <li class="tab"><?= $this->Html->link(__('Create New Client Login Account'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        </ul>
    </div>

    <button class=" btn-block collapse-next">Participants</button>
    <div class="panel collapse">
        <ul class="nav nav-pills nav-stacked">
            <li><?= $this->Html->link(__('List Participants'), ['controller' => 'Participants', 'action' => 'index']) ?></li>
            <li class="tab"><?= $this->Html->link(__('List Participant Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
            <hr>
            <li><?= $this->Html->link(__('Create New Participant'), ['controller' => 'Participants', 'action' => 'add']) ?></li>
            <li class="tab"><?= $this->Html->link(__('Create New Participant Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
        </ul>
    </div>

    <button class=" btn-block collapse-next">Tools</button>
    <div class="panel collapse">
        <ul class="nav nav-pills nav-stacked">
            <li><?= $this->Html->link(__('Create New Tool'), ['controller' => 'Questionnaires', 'action' => 'create']) ?></li>
            <li class="tab"><?= $this->Html->link(__('Create New Input Type'), ['controller' => 'Buttontypes', 'action' => 'add']) ?></li>
            <hr>
            <li><?= $this->Html->link(__('List Tools'), ['controller' => 'Questionnaires', 'action' => 'index']) ?></li>
            <li class="tab"><?= $this->Html->link(__('List Input Types'), ['controller' => 'Buttontypes', 'action' => 'index']) ?></li>
        </ul>
    </div>

    <button class=" btn-block collapse-next">Sessions</button>
    <div class="panel collapse">
        <ul class="nav nav-pills nav-stacked">

            <li><?= $this->Html->link(__('List Sessions'), ['controller' => 'Sessions', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('New Session'), ['controller' => 'Sessions', 'action' => 'add']) ?></li>
            <hr>
            <li><?= $this->Html->link(__('List Runs'), ['controller' => 'Runs', 'action' => 'index']) ?></li>
            <hr>
            <li><?= $this->Html->link(__('List Observations'), ['controller' => 'Observations', 'action' => 'index']) ?></li>
        </ul>
    </div>

    <button class=" btn-block collapse-next">Reports</button>
    <div class="panel collapse">
        <ul class="nav nav-pills nav-stacked">
            <li><?= $this->Html->link(__('List Observations'), ['controller' => 'Observations', 'action' => 'index']) ?> </li>
        </ul>
    </div>
    <script>
        $(document).ready(function(){
            $(".collapse-next").unbind("click").click(function(){
                $(this).next().slideToggle();
            });
        });
    </script>

<?php $this->end(); ?>