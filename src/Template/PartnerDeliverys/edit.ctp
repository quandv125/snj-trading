<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $partnerDelivery->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $partnerDelivery->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Partner Deliverys'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Invoices'), ['controller' => 'Invoices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Invoice'), ['controller' => 'Invoices', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="partnerDeliverys form large-9 medium-8 columns content">
    <?= $this->Form->create($partnerDelivery) ?>
    <fieldset>
        <legend><?= __('Edit Partner Delivery') ?></legend>
        <?php
            echo $this->Form->input('code');
            echo $this->Form->input('name');
            echo $this->Form->input('tel');
            echo $this->Form->input('address');
            echo $this->Form->input('location');
            echo $this->Form->input('fax');
            echo $this->Form->input('email');
            echo $this->Form->input('gender');
            echo $this->Form->input('tax_registration_number');
            echo $this->Form->input('note');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
