<!-- <div class="page-inner">
<?php //echo $this->Flash->render(); ?>
    <div id="main-wrapper">
        <div class="row">
            <div class="col-md-3 center">
                <div class="login-box">
                   
                     <?php //echo $this->Html->link('SNJ Trading Company',['controller'=>'Pages','action' =>'index'],['class'=>'logo-name text-lg text-center']) ?>
                    <p class="text-center m-t-md">Please login into your account.</p>
                    <?= $this->Form->create() ?>
                        <div class="form-group">
                           <?php //echo $this->Form->input('username',['label' => false]) ?>
                        </div>
                        <div class="form-group">
                            <?php //echo $this->Form->input('password',['label' => false]) ?>
                        </div>
                        <div class="form-group">
                        	<?php //echo $this->Form->button(__('Login'),['class' => 'btn btn-success btn-block']); ?>
 						</div>
                        <a href="forgot.html" class="display-block text-center m-t-md text-sm">Forgot Password?</a>
                        <p class="text-center m-t-xs text-sm">Do not have an account?</p>
                        
                        <?php //echo $this->Html->link('Create an account',['controller'=>'Users','action' =>'register'],['class'=>'btn btn-default btn-block m-t-md']) ?>
                    <?php //echo $this->Form->end(); ?>
                    <p class="text-center m-t-xs text-sm">2015 &copy; Modern by Steelcoders.</p>
                </div>
            </div>
        </div>
    </div>
</div> -->
<div id="a-content">
    <div class="row target" id="a-row">
        <?php echo $this->Flash->render(); ?>
        <div class="" id="a-left">
            <div class="container a-formcon col-centered">
            <!-- <h2 class="title-shop-page"><?= $this->Html->image('logo.png',['url'=>['controller'=> 'pages','action' =>'index'],'width'=>'50%']) ?></h2> -->
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

<div class="divider25"></div>