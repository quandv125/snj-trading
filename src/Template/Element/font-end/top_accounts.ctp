<?php if (isset($user_info) && !empty($user_info)):?>
	<?php  echo $this->Html->link('<i class="fa fa-user"></i> '.$this->MyHtml->_Cutstring($user_info['username'], $max = 13, $num = 10), ['controller' => 'pages', 'action' => 'accounts'],['escape' =>false]); ?>
	<ul class="sub-menu-top">
		<li> <?php echo $this->Html->link('<i class="fa fa-user"></i> '.__('Account Info'), ['controller'=>'Pages','action' => 'accounts'],['escape' => false]) ?></li>
		<!-- <li><?php echo $this->Html->link('<i class="fa fa-cubes"></i> '.__('Orders'),['controller'=>'Pages','action'=>'orders'],['escape' =>false]) ?>
		</li> -->
		<li><?php echo $this->Html->link('<i class="fa fa-file-text-o"></i> '.__('Inquiry'),['controller'=>'Inquiries','action'=>'index'],['escape' =>false]) ?>
		</li>
		<li><?php echo $this->Html->link('<i class="fa fa-heart-o"></i> '.__('Wishlists'),['controller'=>'Pages','action'=>'wishlists'],['escape' =>false]) ?>
		</li>
		<?php if ($user_info['group_id'] == ADMIN): ?>
			<li><?php echo $this->Html->link('<i class="fa fa-home"></i> '.__('Admin'),['controller'=>'Inquiries','action'=>'inquiries'],['escape' =>false]) ?>
		</li>
		<?php endif ?>
		<li><?php echo $this->Html->link('<i class="fa fa-unlock-alt"></i> '.__('Logout'),['controller'=>'users','action'=>'logout'],['escape' =>false]) ?>
		</li>
	</ul>
<?php else: ?>
	<?php //echo $this->Html->link(__('Login/Register'), ['controller' => 'pages', 'action' => 'display','home'],['escape' =>false]); ?>

<span class="cursor-point" data-toggle="modal" data-target="#myModal">Login/Register</span>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
       
        <div class="modal-body">

            <div class="row target" id="a-row3">
              
                <div class="" id="a-left">
                    <div class="container a-formcon col-centered">
                        <div class="account-login">
                            <?= $this->Form->create(Null,['url'=>['controller'=>'Users','action'=>'login'],'class'=>'form-my-account']) ?>
                            <?= $this->Form->input('username',['label' => false,'placeholder'=>"Username *"]) ?>
                            <?= $this->Form->input('password',['label' => false,'placeholder'=>"Password *"]) ?>
                            <p>
                                <input type="checkbox"  id="remember" /> <label for="remember">Remember me</label>
                                <?= $this->Html->link('Forgot Password',['controller' => 'Users', 'action' => 'lostpassword']) ?>
                            </p>
                            <?= $this->Form->button(__('Login'),['class' => 'btn-sb-login']); ?>
                            <?= $this->Form->end(); ?>
                            <br>
                            <div class="text-align-center">
                            <?= $this->Html->link('Not a member? Sign Up Now',['controller'=>'users','action'=>'register']) ?>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>

    </div>
</div>
  
<?php endif; ?>
