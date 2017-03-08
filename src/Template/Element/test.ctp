<!-- Left this here as example of use
 use following to call as a patrial from another view-->
<!--           --><?//= $this->Element('test') ?>
<!---->
<!--            --><?//= $this->fetch('admin'); ?>
<!--            --><?//= $this->fetch('client'); ?>
<!--            --><?//= $this->fetch('reggo'); ?>


<?php $this->start('admin'); ?>
<div class="btn btn-warning"> Yeah mother fucker, i is admin</div>

<?php $this->end(); ?>
<?php $this->start('client'); ?>

<div class="btn btn-warning"> CLIENT admin mofo</div>

<?php $this->end(); ?>

<?php $this->start('reggo'); ?>
<div class="btn btn-warning"> reg user don't mind me</div>

<?php $this->end(); ?>
