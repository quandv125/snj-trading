<?php if (isset($user_info) && !empty($user_info)):?>
	<?php  echo $this->Html->link('<i class="fa fa-user"></i> '.$user_info['fullname'], ['controller' => 'pages', 'action' => 'accounts'],['escape' =>false]); ?>
	<ul class="sub-menu-top">
	    <li> <?php echo $this->Html->link('<i class="fa fa-user"></i> Account Info', ['controller'=>'Pages','action' => 'accounts'],['escape' => false]) ?></li>
		<li><?php echo $this->Html->link('<i class="fa fa-unlock-alt"></i> Logout',['controller'=>'users','action'=>'logout'],['escape' =>false]) ?>
		</li>
		<li><?php echo $this->Html->link('<i class="fa fa-heart-o"></i> Wishlists',['controller'=>'Pages','action'=>'wishlists'],['escape' =>false]) ?>
		</li>
	   <!--  <li><a href="checkout.html"><i class="fa fa-sign-in"></i> Checkout</a></li> -->
	   <?php if ($user_info['group_id'] == ADMIN): ?>
	   	<li><?php echo $this->Html->link('<i class="fa fa-home"></i> Admin',['controller'=>'pages','action'=>'display','home'],['escape' =>false]) ?>
	    </li>
	   <?php endif ?>
	</ul>
<?php else: ?>
	<?php echo $this->Html->link('Login/Register', ['controller' => 'pages', 'action' => 'display','home'],['escape' =>false]); ?>
<?php endif; ?>