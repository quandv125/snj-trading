<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $invoice->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $invoice->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Invoices'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Outlets'), ['controller' => 'Outlets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Outlet'), ['controller' => 'Outlets', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Coupons'), ['controller' => 'Coupons', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Coupon'), ['controller' => 'Coupons', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Payments'), ['controller' => 'Payments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Payment'), ['controller' => 'Payments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Partner Deliverys'), ['controller' => 'PartnerDeliverys', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Partner Delivery'), ['controller' => 'PartnerDeliverys', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Invoice Products'), ['controller' => 'InvoiceProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Invoice Product'), ['controller' => 'InvoiceProducts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="invoices form large-9 medium-8 columns content">
    <?= $this->Form->create($invoice) ?>
    <fieldset>
        <legend><?= __('Edit Invoice') ?></legend>
        <?php
            echo $this->Form->input('code');
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('create_by', ['empty' => true]);
            echo $this->Form->input('status');
            echo $this->Form->input('type');
            echo $this->Form->input('customer_id', ['options' => $customers]);
            echo $this->Form->input('outlet_id', ['options' => $outlets, 'empty' => true]);
            echo $this->Form->input('coupon_id', ['options' => $coupons, 'empty' => true]);
            echo $this->Form->input('payment_id', ['options' => $payments, 'empty' => true]);
            echo $this->Form->input('partner_delivery_id', ['options' => $partnerDeliverys, 'empty' => true]);
            echo $this->Form->input('discount');
            echo $this->Form->input('note');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
