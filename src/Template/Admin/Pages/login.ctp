<div id="a-content" class="wapper-content">
    <div class="row target" id="a-row">
        <?php echo $this->Flash->render(); ?>
        <div class="" id="a-left">
            <div class="container a-formcon col-centered">
            <h4 class="title-shop-page"><!-- <?= $this->Html->image('logo.png',['url'=>['controller'=> 'pages','action' =>'index'],'width'=>'50%']) ?> -->
                <?php echo __('Login') ?>
            </h4>
                <div class="account-login">
                    <?= $this->Form->create(Null,['url'=>['controller'=>'Users','action'=>'login'],'class'=>'form-my-account']) ?>
                    <?= $this->Form->input('username',['label' => false,'placeholder'=>"Email / Username *"]) ?>
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