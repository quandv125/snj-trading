<nav class="large-3 medium-4 columns" id="actions-sidebar">
	<ul class="side-nav">
		<li class="heading"><?= __('Actions') ?></li>
		<li><?= $this->Form->postLink(
				__('Delete'),
				['action' => 'delete', $user->id],
				['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
			)
		?></li>
		<li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add']) ?></li>
		<li><?= $this->Html->link(__('List Cashflows'), ['controller' => 'Cashflows', 'action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('New Cashflow'), ['controller' => 'Cashflows', 'action' => 'add']) ?></li>
		<li><?= $this->Html->link(__('List Invoices'), ['controller' => 'Invoices', 'action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('New Invoice'), ['controller' => 'Invoices', 'action' => 'add']) ?></li>
		<li><?= $this->Html->link(__('List Logs'), ['controller' => 'Logs', 'action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('New Log'), ['controller' => 'Logs', 'action' => 'add']) ?></li>
		<li><?= $this->Html->link(__('List Stocks'), ['controller' => 'Stocks', 'action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('New Stock'), ['controller' => 'Stocks', 'action' => 'add']) ?></li>
	</ul>
</nav>
<div class="users form large-9 medium-8 columns content">
	<?= $this->Form->create($user) ?>
	<fieldset>
		<legend><?= __('Edit User') ?></legend>
		<?php
			echo $this->Form->input('username');
			echo $this->Form->input('password');
			echo $this->Form->input('avatars');
			echo $this->Form->input('thumbnail');
			echo $this->Form->input('fullname');
			echo $this->Form->input('email');
			echo $this->Form->input('address');
			echo $this->Form->input('tel');
			echo $this->Form->input('date_of_birth', ['empty' => true]);
			echo $this->Form->input('actived');
			echo $this->Form->input('group_id', ['options' => $groups]);
		?>
	</fieldset>
	<?= $this->Form->button(__('Submit')) ?>
	<?= $this->Form->end() ?>
</div>
