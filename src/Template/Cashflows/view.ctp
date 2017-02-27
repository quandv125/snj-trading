<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cashflow'), ['action' => 'edit', $cashflow->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cashflow'), ['action' => 'delete', $cashflow->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cashflow->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cashflows'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cashflow'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cashflows view large-9 medium-8 columns content">
    <h3><?= h($cashflow->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Code') ?></th>
            <td><?= h($cashflow->code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $cashflow->has('user') ? $this->Html->link($cashflow->user->id, ['controller' => 'Users', 'action' => 'view', $cashflow->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Payer') ?></th>
            <td><?= h($cashflow->payer) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Receiver') ?></th>
            <td><?= h($cashflow->receiver) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($cashflow->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= $this->Number->format($cashflow->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Value') ?></th>
            <td><?= $this->Number->format($cashflow->value) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($cashflow->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($cashflow->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Note') ?></h4>
        <?= $this->Text->autoParagraph(h($cashflow->note)); ?>
    </div>
</div>
