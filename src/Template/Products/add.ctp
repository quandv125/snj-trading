<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Products'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Outlets'), ['controller' => 'Outlets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Outlet'), ['controller' => 'Outlets', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Supplier'), ['controller' => 'Suppliers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Images'), ['controller' => 'Images', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Image'), ['controller' => 'Images', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Invoice Products'), ['controller' => 'InvoiceProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Invoice Product'), ['controller' => 'InvoiceProducts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stock Products'), ['controller' => 'StockProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stock Product'), ['controller' => 'StockProducts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="products form large-9 medium-8 columns content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Add Product') ?></legend>
        <?php
            echo $this->Form->input('sku');
            echo $this->Form->input('product_name');
            echo $this->Form->input('categorie_id', ['options' => $categories]);
            echo $this->Form->input('outlet_id', ['options' => $outlets, 'empty' => true]);
            echo $this->Form->input('supplier_id', ['options' => $suppliers, 'empty' => true]);
            echo $this->Form->input('status');
            echo $this->Form->input('retail_price');
            echo $this->Form->input('wholesale_price');
            echo $this->Form->input('supply_price');
            echo $this->Form->input('stock_level');
            echo $this->Form->input('unit');
            echo $this->Form->input('variants');
            echo $this->Form->textarea('short_description',['label' => 'Short Description']);
            echo $this->Form->textarea('description',['label' => 'Description']);
            echo $this->Form->input('stock_min');
            echo $this->Form->input('stock_max');
            echo $this->Form->input('ordering_note');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
