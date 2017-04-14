<?php
/**
* @var \App\View\AppView $this
*/

$options = [
    'M' => 'Masculine',
'F' => 'Feminine',
'N' => 'Neuter'
];


?>

<?= $this->Form->create($result) ?>
<fieldset>
    <legend><?= __('Add Result') ?></legend>
    <?php
        echo $this->Form->input('observation_id', ['options' => $observations]);
    echo $this->Form->input('q_key1');
    echo $this->Form->input('q_value1', array('type' => 'radio', 'options' => array('1', '2', '3', '4', '5'), 'name' => 'grp 1'));

    echo $this->Form->input('q_key2');
    echo $this->Form->input('q_value2', array('type' => 'radio', 'options' => array('1', '2', '3', '4', '5')));


    // echo $this->Form->input('img');
    ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>

