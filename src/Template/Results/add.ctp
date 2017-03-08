<?php
/**
* @var \App\View\AppView $this
*/
?>

<?= $this->Form->create($result) ?>
<fieldset>
    <legend><?= __('Add Result') ?></legend>
    <?php
        echo $this->Form->input('observation_id', ['options' => $observations]);
    echo $this->Form->input('q_key');
    echo $this->Form->input('q_value');
    echo $this->Form->input('img');
    ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
