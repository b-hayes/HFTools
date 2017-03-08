<?php
/**
  * @var \App\View\AppView $this
  */
?>

<?= $this->Form->create($session, [
'url' => [
'controller' => 'Sessions', 'action' => 'add'
],
]) ?>
<fieldset>
    <legend><?= __('Add Session') ?></legend>
    <?php
            echo $this->Form->input('name');
    echo $this->Form->input('description');
    //echo $this->Form->input('start_date');
    echo $this->Form->input('end_date');
    echo $this->Form->control('start_date', ['type' => 'datetime']);
    //echo $this->Form->control('end_date', ['type' => 'date']);
    if($this->request->session()->read('Auth.User.client_id') != null){
    echo $this->Form->hidden('client_id', ['default' => $this->request->session()->read('Auth.User.client_id') ]);
    }
    else {
    echo $this->Form->input('client_id');
    }
    ?>

</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>

