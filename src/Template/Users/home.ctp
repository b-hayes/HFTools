<?php
/**
  * @var \App\View\AppView $this
  */
?>
<script>
</script>
<div class="row">

</div>


<!-- Grab Pannels based on the role of logged in user -->

<div class="row">
    <?php
    // Make user info available ...  (this has to be made available to all elements somehow)
    $User = $this->request->session()->read('Auth.User');

    //Grab user specific menu options, name, and show logoff button
    if(isset($User)){
    echo $this->Element('Panels/home_' . $User['role']); //filename based on user role eg Panels/home_admin.ctp
    }
    ?>
</div>
