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
$role = $this->request->session()->read('Auth.User.role');
if ($role == "admin"){
    $device = "lg";
    //TODO: Just and idea maybe change the target device size between admin vs client and change scaling accordingly
    //so using this device variable as part of the scaling classes everywhere else..
} else {
    $device = "sm";
}
?>

<!-- Protect dangerous actions with dangerous-action class.  -->
<div id="dangerModal" class="modal fade" role="dialog">
    <div class="modal-dialog dangerous">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><span class="glyphicon glyphicon-exclamation-sign"></span> Caution.</h4>
            </div>
            <div class="modal-body">
                <p>Some text in the modal.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="continue-action btn btn-danger pull-left">Continue</button>
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel Action</button>
            </div>
        </div>
    </div>
</div>


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
<!--    --><?php //echo $this->Html->css('bootstrap-dialog.min.css') ?>
    <?= $this->Html->css('override.css') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>

    <?= $this->Html->script('/webroot/js/jquery-3.2.1.min.js'); ?>
    <?= $this->Html->script('/webroot/js/bootstrap.min.js'); ?>
    <?= $this->Html->script('/webroot/js/bootstrap-datepicker.min.js'); ?>
<!--    --><?php //echo $this->Html->script('/webroot/js/bootstrap-dialog.min.js'); ?>
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

<script>
    $(document).ready(function () {
        $(".dangerous-action").each(function () {
            var action = $( this ).attr("onclick");
            var danger = $( this ).attr("danger");
            var title = $( this ).attr("title");
            $( this ).prop('onclick',null);
            $( this ).click(function () {
                if(danger == undefined){
                    danger = "The following action may have serious implication."
                }
                if(title == undefined){
                    title = "Continue";
                }
                $("#dangerModal .modal-body").html(danger);
                $("#dangerModal .continue-action").html(title);
                $("#dangerModal .continue-action").unbind('click'); //make sure we remove last action used
                $("#dangerModal .continue-action").attr('onclick', action); //assign the action to the continue button
                $("#dangerModal").modal('show');
            });
        });


        function setCheckBoxes() {
            $(".checkbox > label").addClass("btn btn-default btn-block");
            $(".checkbox > label").click(function () {

                if($( this ).find("input").is(':checked')){
                    console.log("checked");
                    $( this ).addClass("active");
                } else {
                    console.log("un-checked");
                    $( this ).removeClass("active");
                }
            });
        }
        setCheckBoxes();
    })
</script>