<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Run $run
  */

?>

<div id="div-id-name">
    <p class="info no-print">If the print fails you can try again by clicking by clicking the print button <button class="pull-right" onclick="printMe()"><span class="glyphicon glyphicon-print"></span> Print...</button></p>
    <div class="panel-body">
        <div class="panel-group">
            <?php foreach($run->observations as $observations): ?>
                <div class="">
                    <?php
                    echo $this->requestAction('/observations/view/' . $observations->id);
                    ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</div>

<button onclick="goBack()">Back</button>

<script>
    function goBack() {
        window.history.back();
    }
    function printMe() {
        window.print();
    }
    
    $(function () {
        printMe();
    })
</script>


