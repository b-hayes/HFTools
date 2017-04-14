<?php
/**
* @var \App\View\AppView $this
*/
?>

<?= $this->Form->create('result') ?>
<fieldset>
    <legend><?= __('Add Result') ?></legend>
    <?php
    echo $this->Form->input('0.observation_id', ['options' => $observations]);
    echo $this->Form->input('0.q_key');
    echo $this->Form->input('0.q_value', array('type' => 'radio', 'options' => array('1', '2', '3', '4', '5')));

    echo $this->Form->input('1.observation_id', ['options' => $observations]);
    echo $this->Form->input('1.q_key');
    echo $this->Form->input('1.q_value', array('type' => 'radio', 'options' => array('1', '2', '3', '4', '5')));

    // echo $this->Form->input('img');
    ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
