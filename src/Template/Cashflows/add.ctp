<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Cashflows'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cashflows form large-9 medium-8 columns content">
    <?= $this->Form->create($cashflow) ?>
    <fieldset>
        <legend><?= __('Add Cashflow') ?></legend>
        <?php
            echo $this->Form->input('code');
            echo $this->Form->input('type');
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('payer');
            echo $this->Form->input('receiver');
            echo $this->Form->input('value');
            echo $this->Form->input('note');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
