<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Cashflow'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cashflows index large-9 medium-8 columns content">
    <h3><?= __('Cashflows') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('payer') ?></th>
                <th scope="col"><?= $this->Paginator->sort('receiver') ?></th>
                <th scope="col"><?= $this->Paginator->sort('value') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cashflows as $cashflow): ?>
            <tr>
                <td><?= $this->Number->format($cashflow->id) ?></td>
                <td><?= h($cashflow->code) ?></td>
                <td><?= $this->Number->format($cashflow->type) ?></td>
                <td><?= $cashflow->has('user') ? $this->Html->link($cashflow->user->id, ['controller' => 'Users', 'action' => 'view', $cashflow->user->id]) : '' ?></td>
                <td><?= h($cashflow->payer) ?></td>
                <td><?= h($cashflow->receiver) ?></td>
                <td><?= $this->Number->format($cashflow->value) ?></td>
                <td><?= h($cashflow->created) ?></td>
                <td><?= h($cashflow->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $cashflow->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cashflow->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cashflow->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cashflow->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
