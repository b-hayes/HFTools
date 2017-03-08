<?php
/**
  * @var \App\View\AppView $this
  */
?>


<?= $this->Form->create($client) ?>
<fieldset>
    <legend><?= __('Add Client') ?></legend>
    <?php
        echo $this->Form->input('name');
    echo $this->Form->input('address');
    echo $this->Form->input('client_number');
    echo $this->Form->input('contact_number');
    echo $this->Form->input('email');
    echo $this->Form->input('contact_person');
    echo $this->Form->input('acount_created', ['empty' => true]);
    echo $this->Form->input('participants._ids', ['options' => $participants]);
    ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
