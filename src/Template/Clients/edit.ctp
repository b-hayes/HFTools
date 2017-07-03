<?php
/**
  * @var \App\View\AppView $this
  */
?>
    <?= $this->Form->create($client) ?>
    <fieldset>
        <legend><?= __('Edit Client') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('address');
            echo $this->Form->control('client_number');
            echo $this->Form->control('contact_number');
            echo $this->Form->control('email');
            echo $this->Form->control('contact_person');
            echo $this->Form->control('acount_created', ['empty' => true]);
            echo $this->Form->control('participants._ids', ['options' => $participants]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
