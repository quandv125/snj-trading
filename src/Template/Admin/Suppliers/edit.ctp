<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $supplier->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $supplier->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Suppliers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="suppliers form large-9 medium-8 columns content">
    <?= $this->Form->create($supplier) ?>
    <fieldset>
        <legend><?= __('Edit Supplier') ?></legend>
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
