<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';

// Make user infor available to all views with this layout
$User = $this->request->session()->read('Auth.User');
//How long in seconds until login session expires, used for redirecting back to login page
$timeout = (3*60*60)+10; //currently set to 3 hours + 10 seconds

?>
<!DOCTYPE html>
<html>
<head>
    <!--    Session Timeout Redirect    -->
    <meta http-equiv="refresh" content="<?=
        $timeout . " ;
    " . $this->Url->build([
    "controller" => "Users",
    "action" => "login"
    ]) ?>"/>

    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('bootstrap-arrow-buttons.css') ?>
    <?= $this->Html->script(['jquery-3.1.1.slim.js', 'bootstrap.min.js', 'jquery.ui.datepicker.min.js']) ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>

    <?= $this->Html->css('overrides.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

</head>
<body>

<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="<?= $this->Html->Url->build(
                    ['controller'=>'Users', 'action'=>'home']
                ) ?>">
                <span class="navbar-brand glyphicon glyphicon-home">
                         HFTools
                </span>
            </a>
        </div>
        <?php
                //Grab user specific menu options, name, and show logoff button
                if(isset($User)){
                    echo $this->Element('Navbar/' . $User['role']); //filename based on user role eg Navbar/admin.ctp
        echo "
        <ul class=\"nav navbar-nav navbar-right\
        ">";
        echo '<P class="navbar-text">Logged in as ' . $User['username'] .
        " | " . $User['role'] .
        "</P>".
        "
        <li>".
            $this->Html->link('<span class="glyphicon glyphicon-log-out"></span> Log out',
            ['controller' => 'Users', 'action' => 'logout'],
            ['escape' => false]
            ) . "
        </li>
        </ul>";
        }
        ?>
    </div>
</nav>

<?= $this->Flash->render() ?>
<div class="container-fluid">
    <?= $this->fetch('content') ?>
</div>
<footer>
</footer>
</body>
</html>
