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

$cakeDescription = 'Human Factors Tools';
$role = $this->request->session()->read('Auth.User.role'); //TODO: DAN .. fake it till u make it. This var determines sidebar display
if ($role == "admin"){
    $device = "lg";
    //TODO: Just and idea maybe change the target device size between admin vs client and change scaling accordingly
    //so using this device variable as part of the scaling classes everywhere else..
} else {
    $device = "sm";
}
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('bootstrap.min.css') ?>
    <?php echo $this->Html->css('base.css') ?>
    <?php echo $this->Html->css('bootstrap-datepicker.min.css') ?>
    <?= $this->Html->css('override.css') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>

    <?= $this->Html->script('/webroot/js/jquery-3.2.1.min.js'); ?>
    <?= $this->Html->script('/webroot/js/bootstrap.min.js'); ?>
    <?= $this->Html->script('/webroot/js/bootstrap-datepicker.min.js'); ?>
</head>
<body>
<?= $this->element('Navigation/navigation'); ?>
<?= $this->fetch('top_nav'); ?>

<?= $this->Flash->render() ?>
<div class="container-fluid">
    <div class="row">
        <?php if ($role == "admin"): ?>
            <!-- ADMINS get the side nav -->
            <div class="col-md-3">
                <!--        SIDE NAV        -->
                <?php
                echo $this->element('Navigation/navigation');
                echo $this->fetch('side_nav');
                ?>
            </div>

            <div class="col-md-9">
                <!--        CONTENT         -->
                <?= $this->fetch('content') ?>
            </div>
        <?php else: ?>
            <!-- NO SIDE NAV -->
            <!--        CONTENT  without parent scaling       -->
            <?= $this->fetch('content') ?>
        <?php endif; ?>
    </div>
</div>
<footer>
</footer>
</body>
</html>
