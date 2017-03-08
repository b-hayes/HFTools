<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="days form large-9 medium-8 columns content">
    <?= $this->Form->create($day, [
    'url' => [
    'controller' => 'Days', 'action' => 'add'
    ],
    ]) ?>

    <fieldset>
        <legend><?= __('Add Day') ?></legend>
        <?php
            echo $this->Form->input('name');
        $current_session = $this->request->session()->read('Current.session');
        if($current_session != null){
        //if there is a sessions this form is called from the client guided process and the default should be specified
        echo $this->Form->hidden('session_id', ['default' => $current_session['id']]);
        //and hide date so todays day is sent by default
        echo $this->Form->input('day_date');
        } else {
        //if not we must be admin show all the options...
        echo $this->Form->input('session_id', ['options' => $sessions]);
        // and allow a date selection
        echo $this->Form->input('day_date');
        }


        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
