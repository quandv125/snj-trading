
<form class="well form-horizontal" action="register" method="post"  id="contact_form">
	<fieldset>

	
	<h4 class="title-shop-page">
		<?php echo __('Register Account') ?>
	</h4>

	<div class="form-group">
		<label class="col-md-4 control-label" >Username*</label> 
		<div class="col-md-4 inputGroupContainer">
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				<input name="username" placeholder="Username" class="form-control"  type="text">
			</div>
		</div>
	</div>

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
	  <label class="col-md-4 control-label">Company Name*</label>  
	  <div class="col-md-4 inputGroupContainer">
	  <div class="input-group">
	  <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
	  <input  name="fullname" placeholder="Company Name" class="form-control"  type="text">
	    </div>
	  </div>
	</div>

	 <div class="form-group">
	  <label class="col-md-4 control-label">E-Mail*</label>  
	    <div class="col-md-4 inputGroupContainer">
	    <div class="input-group">
	        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
	  <input name="email" placeholder="E-Mail Address" class="form-control"  type="text">
	    </div>
	  </div>
	</div>

	<div class="form-group">
	  <label class="col-md-4 control-label">Phone*</label>  
	    <div class="col-md-4 inputGroupContainer">
	    <div class="input-group">
	        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
	  <input name="tel" placeholder="Phone" class="form-control" type="text">
	    </div>
	  </div>
	</div>

	<div class="form-group">
	  <label class="col-md-4 control-label">Address*</label>  
	    <div class="col-md-4 inputGroupContainer">
	    <div class="input-group">
	        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
	  <input name="address" placeholder="Address" class="form-control" type="text">
	    </div>
	  </div>
	</div>

<!-- 	
	<div class="form-group">
	    <label class="col-md-4 control-label">Group</label>
	    <div class="col-md-4">
	        <div class="radio">
	            <label>
	                <input type="radio" name="group_id" value="<?= CUSTOMERS?>" checked/> Customers
	            </label>
	        </div>
	        <div class="radio">
	            <label>
	                <input type="radio" name="group_id" value="<?= SUPPLIERS?>" /> Suppliers
	            </label>
	        </div>
	    </div>
	</div> -->
	<!-- <div class="form-group">
	  <label class="col-md-4 control-label">Description*</label>
	    <div class="col-md-4 inputGroupContainer">
	    <div class="input-group">
	        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
	        	<textarea class="form-control" name="description" placeholder="Project Description"></textarea>
	  </div>
	  </div>
	</div> -->
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
<!-- <div id="a-content">
    <div class="row target" id="a-row2">
        <?php //echo $this->Flash->render(); ?>
        <div class="" id="a-left">
            <div class="container a-formcon col-centered">
            <h2 class="title-shop-page">
            	<?php //echo $this->Html->image('logo.png',['url'=>['controller'=> 'pages','action' =>'index'],'width'=>'50%']) ?>
            </h2>
			<div class="account-login">
				<?php //echo $this->Form->create(Null,['url'=>['action'=>'register'],'class'=>'form-my-account1']) ?>
				<?php //echo $this->Form->input('username',['placeholder'=>"Username *","required"]) ?>
				<?php //echo $this->Form->input('password',['placeholder'=>"Password *","required"]) ?>
				<?php //echo $this->Form->input('confirm_password',['type'=>'password','placeholder'=>"Confirm Password *","required"])?>
				<?php //echo $this->Form->input('fullname',['placeholder'=>"Fullname *","required"]) ?>
				<?php //echo $this->Form->input('email',['placeholder'=>"Email *","required","name" =>"email"]) ?>
				<?php //echo $this->Form->input('group_id', ['type' => 'radio','default' => CUSTOMERS ,'options' => [ 
						// ['value' => CUSTOMERS, 'text' => __('Customers')],
						// ['value' => SUPPLIERS, 'text' => __('Suppliers')]]
				//]);?>
				<div class="col-md-8 wapper-captcha1"> <?php //echo $this->Html->image('/users/captcha',['class'=>'captcha']);?></div>
				<div class="col-md-4 reload"> <span class="btn btn-success reload_captcha cursor-point" style="margin-top: 8px;"><i class="fa fa-refresh" aria-hidden="true" style="font-size: 1.4em;"></i></span></div>
				<br/> <br/> <br/><br/> 
				<?php  //echo $this->Form->input('captcha', ['label'=>false,'placeholder' => 'captcha']);?>
				<?php //echo $this->Form->button(__('Login'),['class' => 'btn-sb-login']); ?>
				<?php //echo $this->Form->end(); ?>
			</div>
            </div>
        </div>
    </div>
</div>

<div class="divider25"></div> -->