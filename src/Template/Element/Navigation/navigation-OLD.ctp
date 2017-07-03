<?php $this->start('top_nav'); ?>
    <ul>
        <!-- this if condition checks if a user has an active session. If they do then we display navigation -->
        <?php if ($this->request->session()->read('Auth')): ?>
            <li style="float:right"><a class="flex-item" href="">Logout</a></li>
            <li style="float:right"><a class="flex-item" href="">Settings</a></li>
            <!-- otherwise there is no current session and so we should how them the login button -->
        <?php else: ?>
            <li style="float:right"><a href="">Contact Us</a></li>
            <li style="float:right"><a href="">Login</a></li>
        <?php endif; ?>
    </ul>
<?php $this->end(); ?>

<?php $this->start('side_nav'); ?>
    <button class="accordion">Accounts</button>
    <div class="panel">
        <ul class="side-nav">
            <li><?= $this->Html->link(__('List accounts'), ['controller' => 'Users', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('Create new account'), ['controller' => 'Users', 'action' => 'add']) ?></li>
            <li><?= $this->Html->link(__('List clients'), ['controller' => 'Clients', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('Create new client'), ['controller' => 'Clients', 'action' => 'add']) ?></li>
        </ul>
    </div>

    <button class="accordion">Questionnaires</button>
    <div class="panel">
            <ul class="side-nav">
                <li><?= $this->Html->link(__('List Questionnaires'), ['controller' => 'Questionnaires', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('Create new questionnaire'), ['controller' => 'Questionnaires', 'action' => 'create']) ?></li>
            </ul>
    </div>

    <button class="accordion">Sessions</button>
    <div class="panel">
        <ul class="side-nav">
            <li><?= $this->Html->link(__('New Run'), ['controller' => 'Runs', 'action' => 'add']) ?></li>
            <li><?= $this->Html->link(__('List Sessions'), ['controller' => 'Sessions', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('New Session'), ['controller' => 'Sessions', 'action' => 'add']) ?></li>
            <li><?= $this->Html->link(__('List Observations'), ['controller' => 'Observations', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('New Observation'), ['controller' => 'Observations', 'action' => 'add']) ?></li>
        </ul>
    </div>

    <button class="accordion">Reports</button>
    <div class="panel">
        <ul class="side-nav">
            <li><?= $this->Html->link(__('List Observations'), ['controller' => 'Observations', 'action' => 'index']) ?> </li>
            <li><?= $this->Html->link(__('New Observation'), ['controller' => 'Observations', 'action' => 'add']) ?> </li>
            <li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']) ?> </li>
            <li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']) ?> </li>
        </ul>
    </div>

<?= $this->Html->script('/webroot/js/accordionScript'); ?>
<?php $this->end(); ?>