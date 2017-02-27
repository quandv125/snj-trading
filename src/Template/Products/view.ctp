<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Product'), ['action' => 'edit', $product->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Outlets'), ['controller' => 'Outlets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Outlet'), ['controller' => 'Outlets', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Supplier'), ['controller' => 'Suppliers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Images'), ['controller' => 'Images', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Image'), ['controller' => 'Images', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Invoice Products'), ['controller' => 'InvoiceProducts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Invoice Product'), ['controller' => 'InvoiceProducts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stock Products'), ['controller' => 'StockProducts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stock Product'), ['controller' => 'StockProducts', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="products view large-9 medium-8 columns content">
    <h3><?= h($product->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Sku') ?></th>
            <td><?= h($product->sku) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Name') ?></th>
            <td><?= h($product->product_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= $product->has('category') ? $this->Html->link($product->category->name, ['controller' => 'Categories', 'action' => 'view', $product->category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Outlet') ?></th>
            <td><?= $product->has('outlet') ? $this->Html->link($product->outlet->name, ['controller' => 'Outlets', 'action' => 'view', $product->outlet->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Supplier') ?></th>
            <td><?= $product->has('supplier') ? $this->Html->link($product->supplier->name, ['controller' => 'Suppliers', 'action' => 'view', $product->supplier->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($product->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Unit') ?></th>
            <td><?= h($product->unit) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Variants') ?></th>
            <td><?= h($product->variants) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($product->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ordering Note') ?></th>
            <td><?= h($product->ordering_note) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($product->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Retail Price') ?></th>
            <td><?= $this->Number->format($product->retail_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Wholesale Price') ?></th>
            <td><?= $this->Number->format($product->wholesale_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Supply Price') ?></th>
            <td><?= $this->Number->format($product->supply_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Stock Level') ?></th>
            <td><?= $this->Number->format($product->stock_level) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Stock Min') ?></th>
            <td><?= $this->Number->format($product->stock_min) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Stock Max') ?></th>
            <td><?= $this->Number->format($product->stock_max) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($product->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($product->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Images') ?></h4>
        <?php if (!empty($product->images)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Product Id') ?></th>
                <th scope="col"><?= __('Path') ?></th>
                <th scope="col"><?= __('Thumbnail') ?></th>
                <th scope="col"><?= __('Actived') ?></th>
                <th scope="col"><?= __('Group Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($product->images as $images): ?>
            <tr>
                <td><?= h($images->id) ?></td>
                <td><?= h($images->product_id) ?></td>
                <td><?= h($images->path) ?></td>
                <td><?= h($images->thumbnail) ?></td>
                <td><?= h($images->actived) ?></td>
                <td><?= h($images->group_id) ?></td>
                <td><?= h($images->created) ?></td>
                <td><?= h($images->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Images', 'action' => 'view', $images->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Images', 'action' => 'edit', $images->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Images', 'action' => 'delete', $images->id], ['confirm' => __('Are you sure you want to delete # {0}?', $images->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Invoice Products') ?></h4>
        <?php if (!empty($product->invoice_products)): ?>
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
            <?php foreach ($product->invoice_products as $invoiceProducts): ?>
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
    <div class="related">
        <h4><?= __('Related Stock Products') ?></h4>
        <?php if (!empty($product->stock_products)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Product Id') ?></th>
                <th scope="col"><?= __('Stock Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($product->stock_products as $stockProducts): ?>
            <tr>
                <td><?= h($stockProducts->id) ?></td>
                <td><?= h($stockProducts->product_id) ?></td>
                <td><?= h($stockProducts->stock_id) ?></td>
                <td><?= h($stockProducts->created) ?></td>
                <td><?= h($stockProducts->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'StockProducts', 'action' => 'view', $stockProducts->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'StockProducts', 'action' => 'edit', $stockProducts->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'StockProducts', 'action' => 'delete', $stockProducts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $stockProducts->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
