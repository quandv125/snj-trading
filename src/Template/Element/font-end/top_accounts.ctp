<?php if (isset($user_info) && !empty($user_info)):?>
	<?php echo '<i class="fa fa-user"></i> '.$this->MyHtml->_Cutstring($user_info['username'], $max = 13, $num = 10); ?>
	<ul class="sub-menu-top">
		<li> 
			<?php echo $this->Html->link('<i class="fa fa-user"></i> '.__('Account Info'), ['controller'=>'Pages','action' => 'accounts'],['escape' => false]) ?>
		</li>
	
		<?php if ($user_info['group_id'] == ADMIN): ?>
			<li>
				<?php echo $this->Html->link('<i class="fa fa-home"></i> '.__('Admin'),['prefix'=>'admin','controller'=>'Products','action'=>'index'],['escape' =>false]) ?>
			</li>
		<?php endif ?>
		<li><?php echo $this->Html->link('<i class="fa fa-unlock-alt"></i> '.__('Logout'),['controller'=>'users','action'=>'logout'],['escape' =>false]) ?>
		</li>
	</ul>
<?php else: ?>
<span class="cursor-point" data-toggle="modal" data-target="#myModal"><?php echo __("Login/Register") ?></span>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-login">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-body">
				<h4 class="title-shop-page"> <?= $this->Html->image('logo.png',['url'=>['controller'=> 'pages','action' =>'index'],'width'=>'50%']) ?>
				</h4>
					<?= $this->Form->create(Null,['url'=>['controller'=>'Users','action'=>'login'],'class'=>'form-my-account']) ?>
					<?= $this->Form->input('username',['label' => false,'placeholder'=>"Email / Username *"]) ?>
					<?= $this->Form->input('password',['label' => false,'placeholder'=>"Password *"]) ?>
				<p>
					<?= $this->Html->link('Forgot Password',['controller' => 'Users', 'action' => 'lostpassword']) ?>
				</p>
				<br/>
					<?= $this->Form->button(__('Login'),['class' => 'btn-sb-login']); ?>
					<?= $this->Form->end(); ?>
				<br/>
				<div class="text-align-center">
					<?= $this->Html->link('Not a member? Sign Up Now',['controller'=>'users','action'=>'register']) ?>
				</div>
			</div>
		</div>

	</div>
</div>
<?php endif; ?>


