<div id="a-content" class="wapper-content">
    <div class="row target" id="a-row">
        <?php echo $this->Flash->render(); ?>
        <div class="" id="a-left">
            <div class="container a-formcon col-centered">
            <h2 class="title-shop-page"><?php echo $this->Html->image('logo.png',['url'=>['controller'=> 'pages','action' =>'index'],'width'=>'50%']) ?></h2>
                <div class="account-login">
                    <?= $this->Form->create(Null,['url'=>['controller'=>'Users','action'=>'login'],'class'=>'form-my-account']) ?>
                    <?= $this->Form->input('username',['label' => false,'placeholder'=>"Username *"]) ?>
                    <?= $this->Form->input('password',['label' => false,'placeholder'=>"Password *"]) ?>
                    <p>
                        <input type="checkbox"  id="remember" /> <label for="remember">Remember me</label>
                        <?php echo $this->Html->link('Forgot Password',['controller' => 'Users', 'action' => 'lostpassword']) ?>
                    </p>
                    <?= $this->Form->button(__('Login'),['class' => 'btn-sb-login']); ?>
                    <?php echo $this->Form->end(); ?>
                    <br>
                    <div class="text-align-center">
                    <?php echo $this->Html->link('Not a member? Sign Up Now',['controller'=>'users','action'=>'register']) ?>
                    </div>
                </div>
               
            </div>
        </div>
        
    </div>
</div>

<div class="divider25"></div>