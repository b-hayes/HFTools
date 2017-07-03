<?php $this->start('top_nav'); ?>
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header" style="width: ">
                <a class="navbar-brand" href="#"></a>
                <?php  echo $this->Html->image("AMCSBanner2016.png", array('class' => 'logo-image')); ?>

            </div>

            <ul class="nav navbar-nav navbar-right">
                <!-- this if condition checks if a user has an active session. If they do then we display navigation -->
                <?php if ($this->request->session()->read('Auth')): ?>
                    <li style="float:right"><a class="flex-item" href="/~hftools/hftools/users/logout">Logout</a></li>
                    <li style="float:right"><a class="flex-item" href="">Settings</a></li>
                    <!-- otherwise there is no current session and so we should how them the login button -->
                <?php else: ?>
                    <li><a href="#"><span class="glyphicon glyphicon-envelope"></span> Contact Us</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
<?php $this->end(); ?>

<?php $this->start('side_nav'); ?>
    <button class=" btn-block collapse-next">Accounts</button>
    <div class="panel collapse">
        <ul class="nav nav-pills nav-stacked">
            <li><?= $this->Html->link(__('List accounts'), ['controller' => 'Users', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('Create new account'), ['controller' => 'Users', 'action' => 'add']) ?></li>
            <li><?= $this->Html->link(__('List clients'), ['controller' => 'Clients', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('Create new client'), ['controller' => 'Clients', 'action' => 'add']) ?></li>
        </ul>
    </div>

    <button class=" btn-block collapse-next">Questionnaires</button>
    <div class="panel collapse">
        <ul class="nav nav-pills nav-stacked">
            <li><?= $this->Html->link(__('List Questionnaires'), ['controller' => 'Questionnaires', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('Create new questionnaire'), ['controller' => 'Questionnaires', 'action' => 'create']) ?></li>
        </ul>
    </div>

    <button class=" btn-block collapse-next">Sessions</button>
    <div class="panel collapse">
        <ul class="nav nav-pills nav-stacked">
            <li><?= $this->Html->link(__('New Run'), ['controller' => 'Runs', 'action' => 'add']) ?></li>
            <li><?= $this->Html->link(__('List Sessions'), ['controller' => 'Sessions', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('New Session'), ['controller' => 'Sessions', 'action' => 'add']) ?></li>
            <li><?= $this->Html->link(__('List Observations'), ['controller' => 'Observations', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('New Observation'), ['controller' => 'Observations', 'action' => 'add']) ?></li>
        </ul>
    </div>

    <button class=" btn-block collapse-next">Reports</button>
    <div class="panel collapse">
        <ul class="nav nav-pills nav-stacked">
            <li><?= $this->Html->link(__('List Observations'), ['controller' => 'Observations', 'action' => 'index']) ?> </li>
            <li><?= $this->Html->link(__('New Observation'), ['controller' => 'Observations', 'action' => 'add']) ?> </li>
            <li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']) ?> </li>
            <li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']) ?> </li>
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