<div class="row">
    <div class="col-md-3 col-sm-4 col-xs-12 ">
        <div class="sidebar-shop sidebar-left ">
			<?php echo $this->element('font-end/Pages/menu_account_info') ?>
        </div>
       
    </div>
    <div class="col-md-9 col-sm-8 col-xs-12 wapper-content">
       <div class="main-content-shop ">
           <h4><?php echo $this->Html->link('Personal Information <i class="fa fa-edit"></i>',['controller' => 'pages','action' => 'PersonalInformation'],['escape' => false]) ?></h4>
    		<ul class="menu-account-info">
				<li><span class="account-info"><?= __("Username");?> : </span><span class="font-weight-500"> <?php echo $users->username; ?></span></li>
                <li><span class="account-info"><?= __("Password");?> : </span><span class="font-weight-500"> <?php echo $this->Html->link(__('Change Password <i class="fa fa-edit"></i>'), ['controller' =>'Users','action' => 'ChangePasswordUser'],['escape' => false]) ?></span></li>
				<li><span class="account-info"><?= __("Fullname");?> : </span><span class="font-weight-500"> <?php echo $users->fullname; ?></span></li>
				<li><span class="account-info"><?= __("Email");?> : </span><span class="font-weight-500"> <?php echo $users->email;?></span></li>
				<li><span class="account-info"><?= __("Address");?> : </span><span class="font-weight-500"> <?php echo $users->address;?></span></li>
				<li><span class="account-info"><?= __("Phone");?> : </span><span class="font-weight-500"> <?php echo $users->tel;?></span></li>
				<li><span class="account-info"><?= __("Descriptions");?> : </span><span class="font-weight-500"> <?php echo $users->description;?></span></li>
    		</ul>
        </div>
        <!-- End Main Content Shop -->
    </div>
</div>

