<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="sessions form large-9 medium-8 columns content">
    <?= $this->Form->create(null, ['url' => ['controller' => 'Sessions', 'action' => 'add'], ]) ?>
    <fieldset>
        <legend><?= __('Add Session') ?></legend>
        <?php
            echo $this->Form->input('name');
        echo $this->Form->input('description');
        echo $this->Form->input('start_date', ['default' => date_create()->format('Y-m-d H:i:s')]);
        echo $this->Form->input('end_date');

        if($this->request->session()->read('Auth.User.client_id') != null){
        echo $this->Form->input('client_id', ['default' => $this->request->session()->read('Auth.User.client_id') ]);
        }
        else {
        echo $this->Form->input('client_id');
        }
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
