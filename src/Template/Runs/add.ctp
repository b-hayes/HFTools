<?php
/**
* @var \App\View\AppView $this
*/
?>
<?= $this->Form->create($run, [
'url' => [
'controller' => 'Runs', 'action' => 'add'
],
]) ?>
<fieldset>
    <legend><?= __('Add Run') ?></legend>
    <?php
        $current_day = $this->request->session()->read('Current.day');
    if($current_day != null){
    //if we have a current day then we are in the client guided process so select default day
    echo $this->Form->hidden('day_id', ['default' => $current_day['id']]);
    }else{
    //otherwise we admin so give all the options
    echo $this->Form->input('day_id', ['options' => $days]);
    }

    echo $this->Form->input('name');
    echo $this->Form->input('description');
    echo $this->Form->hidden('is_open',['default' => true]);
    ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
