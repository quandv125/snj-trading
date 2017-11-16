<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Supplier'), ['action' => 'edit', $supplier->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Supplier'), ['action' => 'delete', $supplier->id], ['confirm' => __('Are you sure you want to delete # {0}?', $supplier->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Suppliers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Supplier'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="suppliers view large-9 medium-8 columns content">
    <h3><?= h($supplier->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Code') ?></th>
            <td><?= h($supplier->code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($supplier->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tel') ?></th>
            <td><?= h($supplier->tel) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($supplier->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location') ?></th>
            <td><?= h($supplier->location) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fax') ?></th>
            <td><?= h($supplier->fax) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($supplier->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tax Registration Number') ?></th>
            <td><?= h($supplier->tax_registration_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Note') ?></th>
            <td><?= h($supplier->note) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($supplier->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($supplier->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($supplier->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gender') ?></th>
            <td><?= $supplier->gender ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Products') ?></h4>
        <?php if (!empty($supplier->products)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Sku') ?></th>
                <th scope="col"><?= __('Product Name') ?></th>
                <th scope="col"><?= __('Categorie Id') ?></th>
                <th scope="col"><?= __('Outlet Id') ?></th>
                <th scope="col"><?= __('Supplier Id') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Retail Price') ?></th>
                <th scope="col"><?= __('Wholesale Price') ?></th>
                <th scope="col"><?= __('Supply Price') ?></th>
                <th scope="col"><?= __('Stock Level') ?></th>
                <th scope="col"><?= __('Unit') ?></th>
                <th scope="col"><?= __('Variants') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Stock Min') ?></th>
                <th scope="col"><?= __('Stock Max') ?></th>
                <th scope="col"><?= __('Ordering Note') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($supplier->products as $products): ?>
            <tr>
                <td><?= h($products->id) ?></td>
                <td><?= h($products->sku) ?></td>
                <td><?= h($products->product_name) ?></td>
                <td><?= h($products->categorie_id) ?></td>
                <td><?= h($products->outlet_id) ?></td>
                <td><?= h($products->supplier_id) ?></td>
                <td><?= h($products->status) ?></td>
                <td><?= h($products->retail_price) ?></td>
                <td><?= h($products->wholesale_price) ?></td>
                <td><?= h($products->supply_price) ?></td>
                <td><?= h($products->stock_level) ?></td>
                <td><?= h($products->unit) ?></td>
                <td><?= h($products->variants) ?></td>
                <td><?= h($products->description) ?></td>
                <td><?= h($products->stock_min) ?></td>
                <td><?= h($products->stock_max) ?></td>
                <td><?= h($products->ordering_note) ?></td>
                <td><?= h($products->created) ?></td>
                <td><?= h($products->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Products', 'action' => 'view', $products->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Products', 'action' => 'edit', $products->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Products', 'action' => 'delete', $products->id], ['confirm' => __('Are you sure you want to delete # {0}?', $products->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
