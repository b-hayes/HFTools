<ul class="nav navbar-nav">
    <li><a href="#">Researcher Menu 1</a></li>
    <li><a href="#">Researcher Menu 2</a></li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            Admin Tools
            <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><?= $this->Html->link(
                'Clients Manager',
                ['controller' => 'Clients', 'action' => 'index']
                ) ?>
            </li>
            <li><?= $this->Html->link(
                'Users Manager',
                ['controller' => 'Users', 'action' => 'index']
                ) ?>
            </li>
            <li><?= $this->Html->link(
                'Participants Manager',
                ['controller' => 'Participants', 'action' => 'index']
                ) ?>
            </li>
            <li><?= $this->Html->link(
                'Sessions Manager',
                ['controller' => 'Sessions', 'action' => 'index']
                ) ?>
            </li>
            <li><?= $this->Html->link(
                'Days (of sessions) Manager',
                ['controller' => 'Days', 'action' => 'index']
                ) ?>
            </li>
            <li><?= $this->Html->link(
                'Runs (of a Day) Manager',
                ['controller' => 'Runs', 'action' => 'index']
                ) ?>
            </li>
            <li><?= $this->Html->link(
                'Observations (of a Run) Manager',
                ['controller' => 'Observations', 'action' => 'index']
                ) ?>
            </li>
            <li><?= $this->Html->link(
                'Results (of Observations) Manager',
                ['controller' => 'Results', 'action' => 'index']
                ) ?>
            </li>
        </ul>
    </li>
</ul>
<?php
                if(isset($user)){
                    echo "<ul class=\"nav navbar-nav navbar-right\">";
echo '<P class="navbar-text">Logged in as ' . $user['username'] . "</P>".
"
<li>".
    $this->Html->link('<span class="glyphicon glyphicon-log-out"></span> Log out',
    ['controller' => 'Users', 'action' => 'logout'],
    ['escape' => false]
    ) .
    "
</li></ul>";
}
?>
