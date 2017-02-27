

<div class="row">
    <div class="col-md-3 col-sm-4 col-xs-12 ">
        <div class="sidebar-shop sidebar-left ">
            <?= $this->element('font-end/Pages/menu_account_info') ?>
        </div>
    </div>
    <div class="col-md-9 col-sm-8 col-xs-12 ">
       <!--  <h4><?= $this->Html->link(__(""), ['action' => 'accounts#']);?> </h4>
        <div>
            
            <?= $this->Form->create(Null,['url'=>['controller'=>'Users','action'=>'ChangePasswordUser'],'class'=>'form-my-account']) ?>
            <?= $this->Form->input('password',['type'=>'password','label' => false,'placeholder'=>"New password *"]) ?>
            <?= $this->Form->input('comfirm_password',['type'=>'password','label' => false,'placeholder'=>"Comfirm Password *"]) ?>
            <div class="col-md-8 wapper-captcha1"> <?= $this->Html->image('/users/captcha',['class'=>'captcha']);?></div>
            <div class="col-md-4 reload"> <span class="btn btn-success reload_captcha cursor-point" style="margin-top: 8px;"><i class="fa fa-refresh" aria-hidden="true" style="font-size: 1.4em;"></i></span></div>
            <br/> <br/> <br/><br/> 
            <?= $this->Form->input('captcha', [ 'label' => false, 'placeholder' => 'captcha' ]); ?>
            <?= $this->Form->button(__('Login'),['class' => 'btn-sb-login']); ?>
            <?= $this->Form->end(); ?>
           <br/>
        </div> -->

    <form class="well form-horizontal" action="ChangePasswordUser" method="post"  id="contact_form">
    <fieldset>
    
    <h2 class="title-shop-page">
        <?php echo $this->Html->image('logo2.png',['url'=>['controller'=> 'pages','action' =>'index'],'width'=>'15%']) ?>
    </h2>

    <div class="form-group">
        <label class="col-md-4 control-label">Password*</label>  
        <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></span>
                <input  name="password" placeholder="Password" class="form-control"  type="password">
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label">Comfirm Password*</label>  
        <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></span>
                <input  name="confirm_password" placeholder="Comfirm Password" class="form-control"  type="password">
            </div>
        </div>
    </div>
 
    <div class="form-group">
        <label class="col-md-4 control-label"></label>
        <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <div class="col-md-8 wapper-captcha1"> <?php echo $this->Html->image('/users/captcha',['class'=>'captcha']);?></div>
                <div class="col-md-4 reload"> <span class="btn btn-success reload_captcha cursor-point" style="margin-top: 5px;"><i class="fa fa-refresh" aria-hidden="true" style="font-size: 1.4em;"></i></span></div>
                <br/><br/>
        </div>
        </div>
    </div>

     <div class="form-group">
      <label class="col-md-4 control-label"></label>  
        <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-qrcode"></i></span>
            <input type="text" name="captcha" class="form-control" placeholder="Captcha" id="captcha">   
        </div>
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label"></label>
      <div class="col-md-4">
        <button type="submit" class="btn btn-warning" >Submit <span class="glyphicon glyphicon-send"></span></button>
      </div>
    </div>

    </fieldset>
</form>
    </div>
</div>
