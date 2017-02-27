<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Stock'), ['action' => 'edit', $stock->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Stock'), ['action' => 'delete', $stock->id], ['confirm' => __('Are you sure you want to delete # {0}?', $stock->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Stocks'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stock'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stock Products'), ['controller' => 'StockProducts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stock Product'), ['controller' => 'StockProducts', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="stocks view large-9 medium-8 columns content">
    <h3><?= h($stock->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $stock->has('user') ? $this->Html->link($stock->user->id, ['controller' => 'Users', 'action' => 'view', $stock->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tel') ?></th>
            <td><?= h($stock->tel) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($stock->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($stock->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Code') ?></th>
            <td><?= $this->Number->format($stock->code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Actions') ?></th>
            <td><?= $this->Number->format($stock->actions) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($stock->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($stock->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Stock Products') ?></h4>
        <?php if (!empty($stock->stock_products)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Product Id') ?></th>
                <th scope="col"><?= __('Stock Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($stock->stock_products as $stockProducts): ?>
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
