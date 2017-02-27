<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Partner Delivery'), ['action' => 'edit', $partnerDelivery->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Partner Delivery'), ['action' => 'delete', $partnerDelivery->id], ['confirm' => __('Are you sure you want to delete # {0}?', $partnerDelivery->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Partner Deliverys'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Partner Delivery'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Invoices'), ['controller' => 'Invoices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Invoice'), ['controller' => 'Invoices', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="partnerDeliverys view large-9 medium-8 columns content">
    <h3><?= h($partnerDelivery->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Code') ?></th>
            <td><?= h($partnerDelivery->code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($partnerDelivery->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tel') ?></th>
            <td><?= h($partnerDelivery->tel) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($partnerDelivery->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location') ?></th>
            <td><?= h($partnerDelivery->location) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fax') ?></th>
            <td><?= h($partnerDelivery->fax) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($partnerDelivery->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tax Registration Number') ?></th>
            <td><?= h($partnerDelivery->tax_registration_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Note') ?></th>
            <td><?= h($partnerDelivery->note) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($partnerDelivery->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($partnerDelivery->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($partnerDelivery->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gender') ?></th>
            <td><?= $partnerDelivery->gender ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Invoices') ?></h4>
        <?php if (!empty($partnerDelivery->invoices)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Code') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Create By') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Customer Id') ?></th>
                <th scope="col"><?= __('Outlet Id') ?></th>
                <th scope="col"><?= __('Coupon Id') ?></th>
                <th scope="col"><?= __('Invoice Id') ?></th>
                <th scope="col"><?= __('Payment Id') ?></th>
                <th scope="col"><?= __('Partner Delivery Id') ?></th>
                <th scope="col"><?= __('Discount') ?></th>
                <th scope="col"><?= __('Note') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($partnerDelivery->invoices as $invoices): ?>
            <tr>
                <td><?= h($invoices->id) ?></td>
                <td><?= h($invoices->code) ?></td>
                <td><?= h($invoices->user_id) ?></td>
                <td><?= h($invoices->create_by) ?></td>
                <td><?= h($invoices->status) ?></td>
                <td><?= h($invoices->type) ?></td>
                <td><?= h($invoices->customer_id) ?></td>
                <td><?= h($invoices->outlet_id) ?></td>
                <td><?= h($invoices->coupon_id) ?></td>
                <td><?= h($invoices->invoice_id) ?></td>
                <td><?= h($invoices->payment_id) ?></td>
                <td><?= h($invoices->partner_delivery_id) ?></td>
                <td><?= h($invoices->discount) ?></td>
                <td><?= h($invoices->note) ?></td>
                <td><?= h($invoices->created) ?></td>
                <td><?= h($invoices->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Invoices', 'action' => 'view', $invoices->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Invoices', 'action' => 'edit', $invoices->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Invoices', 'action' => 'delete', $invoices->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoices->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
