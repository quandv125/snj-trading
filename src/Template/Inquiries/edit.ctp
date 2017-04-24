<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $inquiry->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $inquiry->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Inquiries'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Inquirie Products'), ['controller' => 'InquirieProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Inquirie Product'), ['controller' => 'InquirieProducts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="inquiries form large-9 medium-8 columns content">
    <?= $this->Form->create($inquiry) ?>
    <fieldset>
        <legend><?= __('Edit Inquiry') ?></legend>
        <?php
            echo $this->Form->input('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->input('status');
            echo $this->Form->input('type');
            echo $this->Form->input('customer_id', ['options' => $customers, 'empty' => true]);
            echo $this->Form->input('vessel');
            echo $this->Form->input('imo_no');
            echo $this->Form->input('ref');
            echo $this->Form->input('discount');
            echo $this->Form->input('profit');
            echo $this->Form->input('delivery_cost');
            echo $this->Form->input('packing_cost');
            echo $this->Form->input('insurance_cost');
            echo $this->Form->input('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
