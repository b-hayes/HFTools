<?php
/**
 * @var \App\View\AppView $this
 */
?>

<div>
    <?= $this->Form->create($session) ?>
    <fieldset>
        <legend><?= __('Add Session') ?></legend>
        <?php
        echo $this->Form->control('name');
        echo $this->Form->control('description');

        // this turns the date from Y-m-d to D-m-y
        $this->Form->templates(
            ['dateWidget' => '{{day}}{{month}}{{year}}']
        );


        echo $this->Form->control('start_date', ['type' => 'text']);
        echo $this->Form->control('end_date', ['type' => 'text']);

        echo $this->Form->control('client_id', ['option' => $clients]);
        echo $this->Form->control('participant._id', array(
            'label' => 'participants',
            'type' => 'select',
            'multiple' => 'checkbox',
            'options' => $participants,
            'value' => $participants
        ));
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<script>

    function getMobileOperatingSystem() {
        var userAgent = navigator.userAgent || navigator.vendor || window.opera;

        // Windows Phone must come first because its UA also contains "Android"
        if (/windows phone/i.test(userAgent)) {
            return "Windows Phone";
        }

        if (/android/i.test(userAgent)) {
            return "Android";
        }

        // iOS detection from: http://stackoverflow.com/a/9039885/177710
        if (/iPad|iPhone|iPod/.test(userAgent) && !window.MSStream) {
            return "iOS";
        }

        return "unknown";
    }


    $(document).ready(function(){
        if(getMobileOperatingSystem()!="unknown"){
            alert(getMobileOperatingSystem());
            //mobile devices use native OS date picker
            $("#start-date").attr('type', 'date');
            $("#end-date").attr('type', 'date');
        } else {
            //Desktop devices use javascript datepicker
            $("#start-date").attr('readonly', 'true');
            $("#end-date").attr('readonly', 'true');
            $("#start-date").datepicker({
                format: "dd/mm/yyyy",
                autoclose: true,
                todayBtn: true,
                orientation: "auto",
                todayHighlight: true
            });
            $("#end-date").datepicker({
                format: "dd/mm/yyyy",
                autoclose: true,
                todayBtn: true,
                orientation: "auto",
                todayHighlight: true
            });
        }
//        $("#start-date").attr('type', 'cus-date');
//        $("#end-date").attr('type', 'cus-date');


    });
</script>
