<?php
/**
  * @var \App\View\AppView $this
  */
?>
<script>
</script>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Client management') ?></li>
        <li><?= $this->Html->link(__('New Client'), ['action' => 'add'])
            ?>
        </li>
        <li><?= $this->Html->link(__('Edit Client'), ['action' => 'add'])
            ?>
        </li>
        <li><?= $this->Html->link(__('List Clienhome.ctpts'),
            ['controller' => 'Clients', 'action' => 'index']) ?>
        </li>
        <li><?= $this->Html->link(__('List Client sessions'),
            ['controller' => 'Clients', 'action' => 'add']) ?>
        </li>
    </ul>
</nav>

<div class="users index large-9 medium-8 columns content">
    <h1>Information </h1>
    <p> hello,  <?= $user['username'] ?> your role is <?=$user['role']?> </p>
</div>
