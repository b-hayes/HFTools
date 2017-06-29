<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div>
    <?= $this->Form->create($session) ?>
    <fieldset>
        <legend><?= __('Edit Session') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('description');
            echo $this->Form->control('start_date');
            echo $this->Form->control('end_date');
            echo $this->Form->control('client_id', ['options' => $clients]);
            echo $this->Form->control('participants._ids', ['options' => $participants]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
