<?php if (isset($user_info) && !empty($user_info)):?>
	<?php  echo $this->Html->link('<i class="fa fa-user"></i> '.$this->MyHtml->_Cutstring($user_info['fullname'], $max = 13, $num = 10), ['controller' => 'pages', 'action' => 'accounts'],['escape' =>false]); ?>
	<ul class="sub-menu-top">
		<li> <?php echo $this->Html->link('<i class="fa fa-user"></i> '.__('Account Info'), ['controller'=>'Pages','action' => 'accounts'],['escape' => false]) ?></li>

		<li><?php echo $this->Html->link('<i class="fa fa-heart-o"></i> '.__('Wishlists'),['controller'=>'Pages','action'=>'wishlists'],['escape' =>false]) ?>
		</li>
		<?php if ($user_info['group_id'] == ADMIN): ?>
			<li><?php echo $this->Html->link('<i class="fa fa-home"></i> '.__('Admin'),['controller'=>'pages','action'=>'display','home'],['escape' =>false]) ?>
		</li>
		<?php endif ?>
		<li><?php echo $this->Html->link('<i class="fa fa-unlock-alt"></i> '.__('Logout'),['controller'=>'users','action'=>'logout'],['escape' =>false]) ?>
		</li>
	</ul>
<?php else: ?>
	<?php echo $this->Html->link(__('Login/Register'), ['controller' => 'pages', 'action' => 'display','home'],['escape' =>false]); ?>
<?php endif; ?>
