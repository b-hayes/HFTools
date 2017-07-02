 <?php
    if (!empty($participants)) {
        echo $this->Form->control('participant._id', array(
            'label' => 'participants',
            'type' => 'select',
            'multiple' => 'checkbox',
            'options' => $participants,
            'value' => $participants
        ));

    } else {
        echo "no participants";
    }

    ?>
