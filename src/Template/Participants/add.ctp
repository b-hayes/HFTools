<?php
/**
  * @var \App\View\AppView $this
  */
?>
    <?= $this->Form->create($participant, [
        'url'=>[
            'controller' => 'Participants', 'action' => 'add'
        ], 'name' => 'form-add-participant'
    ]) ?>
    <fieldset>
        <legend><?= __('Add Participant') ?></legend>
        <?php
            echo $this->Form->control('first_name');
            echo $this->Form->control('last_name');
            echo $this->Form->control('email');
            echo $this->Form->control('phone');
            echo $this->Form->control('clients._ids', ['options' => $clients]);
            //echo $this->Form->control('roles._ids', ['options' => $roles]);
//        ?>
<!--        <div class="col-md-6">-->
<!--            --><?php
            echo $this->Form->control('roles._ids', array(
                'type' => 'select',
                'multiple' => 'checkbox',
                'options' => $roles
            ));
//            ?>
<!--        </div>-->
<!--        <div class="col-md-6">-->
<!--            --><?php
//            echo $this->Form->control('roles._id', array(
//                'label' => 'Roles for this participant?',
//                'type' => 'select',
//                'multiple' => 'checkbox',
//                'options' => $roles,
//                'value' => $roles
//            ));
//            ?>
<!--        </div>-->
<!--        <div><p>testing something</p>-->
<!--            <select multiple>-->
<!--                <option value="volvo">Volvo</option>-->
<!--                <option value="saab">Saab</option>-->
<!--                <option value="opel">Opel</option>-->
<!--                <option value="audi">Audi</option>-->
<!--            </select>-->
<!--        </div>-->
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
