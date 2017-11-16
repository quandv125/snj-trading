<div class="row">
    <div class="col-md-3 col-sm-4 col-xs-12 ">
        <div class="sidebar-shop sidebar-left ">
            <?php echo $this->element('font-end/Pages/menu_account_info') ?>
        </div>
    </div>
    <div class="col-md-9 col-sm-8 col-xs-12 clearfix">
        <form class="well form-horizontal" action="<?php echo $this->Url->build(array('controller'=>'Users','action'=>'edit', $users->id )) ?>" method="post"  id="contact_form">
            <fieldset>
                <h2 class="title-shop-page">
                    <?php // echo $this->Html->image('logo2.png',['url'=>['controller'=> 'pages','action' =>'index'],'width'=>'15%']) ?>
                </h2>

                <div class="form-group">
                    <label class="col-md-4 control-label"><?php echo __("Username");?>*</label> 
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input name="username" placeholder="Username" class="form-control" value="<?php echo $users->username ?>"  type="text">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label"><?php echo __("Full Name");?>*</label>  
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                            <input  name="fullname" placeholder="Full Name" class="form-control" value="<?php echo $users->fullname ?>"  type="text">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label"><?php echo __("E-Mail");?>*</label>  
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                            <input name="email" placeholder="E-Mail Address" class="form-control" value="<?php echo $users->email ?>"  type="text">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label"><?php echo __("Phone");?>*</label>  
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                            <input name="tel" placeholder="Phone" class="form-control" value="<?php echo $users->tel ?>" type="text">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label"><?php echo __("Address");?>*</label>  
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <input name="address" placeholder="Address" class="form-control" value="<?php echo $users->address ?>" type="text">
                        </div>
                    </div>
                </div>
                
               <!--  <div class="form-group">
                    <label class="col-md-4 control-label"><?php //echo __("Group");?></label>
                    <div class="col-md-4">
                        <div class="radio">
                            <label>
                                <input type="radio" name="group_id" value="<?= CUSTOMERS?>" <?php //echo ($users->group_id == CUSTOMERS)? 'checked':'' ?>/> Customers
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="group_id" value="<?= SUPPLIERS?>" <?php //echo ($users->group_id == SUPPLIERS)? 'checked':'' ?>/> Suppliers
                            </label>
                        </div>
                    </div>
                </div>
             -->
               <!--  <div class="form-group">
                  <label class="col-md-4 control-label"><?php //echo __("Description");?>*</label>
                    <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                            <textarea class="form-control" value="" name="description" placeholder="Description"><?php //echo $users->description ?></textarea>
                  </div>
                  </div>
                </div> -->
                <div class="form-group">
                    <label class="col-md-4 control-label"><?php echo __("");?></label>
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <div class="col-md-8 wapper-captcha1"> <?php echo $this->Html->image('/users/captcha',['class'=>'captcha']);?></div>
                            <div class="col-md-4 reload"> <span class="btn btn-success reload_captcha cursor-point" style="margin-top: 5px;"><i class="fa fa-refresh" aria-hidden="true" style="font-size: 1.4em;"></i></span></div><br/><br/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label"><?php echo __("");?></label>  
                    <div class="col-md-4 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-qrcode"></i></span>
                            <input type="text" name="captcha" class="form-control" placeholder="Captcha" id="captcha">   
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label"><?php echo __("");?></label>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-warning" >Submit <span class="glyphicon glyphicon-send"></span></button>
                    </div>
                </div>

            </fieldset>
        </form>
    </div>
</div>
