<!-- 

<div class="row">
    <div class="col-md-3 col-sm-4 col-xs-12 ">
        <div class="sidebar-shop sidebar-left ">
            <?php //echo $this->element('font-end/Pages/menu_account_info') ?>
        </div>
    </div>
    <div class="col-md-9 col-sm-8 col-xs-12 ">
    <h4><?php //echo $this->Html->link(__(""), ['action' => 'accounts#']);?> </h4>
       <div>
            
            <?= $this->Form->create(Null,['url'=>['controller'=>'Users','action'=>'lostpassword'],'class'=>'form-my-account']) ?>
            <?= $this->Form->input('email',['label' => false,'placeholder'=>"email *"]) ?>

            <div class="col-md-8 wapper-captcha1"> <?php //echo $this->Html->image('/users/captcha',['class'=>'captcha']);?></div>
            <div class="col-md-4 reload"> <span class="btn btn-success reload_captcha cursor-point" style="margin-top: 8px;"><i class="fa fa-refresh" aria-hidden="true" style="font-size: 1.4em;"></i></span></div>
            <br/> <br/> <br/><br/> 
            <?php  //echo $this->Form->input('captcha', [
                        // 'label' => false,
                        // 'placeholder' => 'captcha'
                    //]);
             ?>

            <?= $this->Form->button(__('Submit'),['class' => 'btn-sb-login']); ?>
            <?php //echo $this->Form->end(); ?>
           <br/>
        </div>
    </div>
</div> -->
<form class="well form-horizontal" action="lostpassword" method="post"  id="contact_form">
    <fieldset>
    
   <!--  <h2 class="title-shop-page">
        <?php echo $this->Html->image('logo2.png',['url'=>['controller'=> 'pages','action' =>'index'],'width'=>'15%']) ?>
    </h2> -->

    <div class="form-group">
      <label class="col-md-4 control-label">E-Mail*</label>  
        <div class="col-md-4 inputGroupContainer">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
            <input name="email" placeholder="E-Mail Address" class="form-control" type="text">
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