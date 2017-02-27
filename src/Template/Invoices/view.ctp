<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Invoice'), ['action' => 'edit', $invoice->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Invoice'), ['action' => 'delete', $invoice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoice->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Invoices'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Invoice'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Outlets'), ['controller' => 'Outlets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Outlet'), ['controller' => 'Outlets', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Coupons'), ['controller' => 'Coupons', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Coupon'), ['controller' => 'Coupons', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Payments'), ['controller' => 'Payments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Payment'), ['controller' => 'Payments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Partner Deliverys'), ['controller' => 'PartnerDeliverys', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Partner Delivery'), ['controller' => 'PartnerDeliverys', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Invoice Products'), ['controller' => 'InvoiceProducts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Invoice Product'), ['controller' => 'InvoiceProducts', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="invoices view large-9 medium-8 columns content">
    <h3><?= h($invoice->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Code') ?></th>
            <td><?= h($invoice->code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $invoice->has('user') ? $this->Html->link($invoice->user->id, ['controller' => 'Users', 'action' => 'view', $invoice->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($invoice->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Customer') ?></th>
            <td><?= $invoice->has('customer') ? $this->Html->link($invoice->customer->name, ['controller' => 'Customers', 'action' => 'view', $invoice->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Outlet') ?></th>
            <td><?= $invoice->has('outlet') ? $this->Html->link($invoice->outlet->name, ['controller' => 'Outlets', 'action' => 'view', $invoice->outlet->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Coupon') ?></th>
            <td><?= $invoice->has('coupon') ? $this->Html->link($invoice->coupon->name, ['controller' => 'Coupons', 'action' => 'view', $invoice->coupon->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Payment') ?></th>
            <td><?= $invoice->has('payment') ? $this->Html->link($invoice->payment->id, ['controller' => 'Payments', 'action' => 'view', $invoice->payment->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Partner Delivery') ?></th>
            <td><?= $invoice->has('partner_delivery') ? $this->Html->link($invoice->partner_delivery->name, ['controller' => 'PartnerDeliverys', 'action' => 'view', $invoice->partner_delivery->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Note') ?></th>
            <td><?= h($invoice->note) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($invoice->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= $this->Number->format($invoice->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Discount') ?></th>
            <td><?= $this->Number->format($invoice->discount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Create By') ?></th>
            <td><?= h($invoice->create_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($invoice->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($invoice->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Invoice Products') ?></h4>
        <?php if (!empty($invoice->invoice_products)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Product Id') ?></th>
                <th scope="col"><?= __('Invoice Id') ?></th>
                <th scope="col"><?= __('Quantity') ?></th>
                <th scope="col"><?= __('Unit') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($invoice->invoice_products as $invoiceProducts): ?>
            <tr>
                <td><?= h($invoiceProducts->id) ?></td>
                <td><?= h($invoiceProducts->product_id) ?></td>
                <td><?= h($invoiceProducts->invoice_id) ?></td>
                <td><?= h($invoiceProducts->quantity) ?></td>
                <td><?= h($invoiceProducts->unit) ?></td>
                <td><?= h($invoiceProducts->created) ?></td>
                <td><?= h($invoiceProducts->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'InvoiceProducts', 'action' => 'view', $invoiceProducts->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'InvoiceProducts', 'action' => 'edit', $invoiceProducts->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'InvoiceProducts', 'action' => 'delete', $invoiceProducts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoiceProducts->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
