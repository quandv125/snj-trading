<!-- <div class="row">
	<div class="col-md-3 col-sm-4 col-xs-12 ">
		<div class="sidebar-shop sidebar-left ">
			<?php //echo $this->element('font-end/Pages/menu_account_info') ?>
		</div>
	</div>
	<div class="col-md-9 col-sm-8 col-xs-12 wapper-content">
		<div class="main-content-shop ">
			<h4><?php //echo $this->Html->link('Personal Information - Edit <i class="fa fa-edit"></i>',['controller' => 'pages','action' => 'PersonalInformation'],['escape' => false]) ?></h4>
			<ul class="menu-account-info">
				<li><span class="account-info"><?php //echo __("Username");?> : </span><span class="font-weight-500"> <?php //echo $user_info['username']; ?></span></li>
				<li><span class="account-info"><?php //echo __("Password");?> : </span><span class="font-weight-500"> <?php //echo $this->Html->link(__('Change Password <i class="fa fa-edit"></i>'), ['controller' =>'Users','action' => 'ChangePasswordUser'],['escape' => false]) ?></span></li>
				<li><span class="account-info"><?php //echo __("Fullname");?> : </span><span class="font-weight-500"> <?php //echo $user_info['fullname'] ; ?></span></li>
				<li><span class="account-info"><?php //echo __("Email");?> : </span><span class="font-weight-500"> <?php //echo $user_info['email'] ;?></span></li>
				<li><span class="account-info"><?php //echo __("Address");?> : </span><span class="font-weight-500"> <?php //echo $user_info['address'] ;?></span></li>
				<li><span class="account-info"><?php //echo __("Company");?> : </span><span class="font-weight-500"> <?php //echo $user_info['company'] ;?></span></li>
				<li><span class="account-info"><?php //echo __("Phone");?> : </span><span class="font-weight-500"> <?php //echo $user_info['tel'] ;?></span></li>
				<li><span class="account-info"><?php //echo __("Descriptions");?> : </span><span class="font-weight-500"> <?php //echo $user_info['description'] ;?></span></li>
			</ul>
		</div>
	</div>
</div> -->

<div ng-app="myapp" style=" min-height: 666px; ">
    <div ng-view></div>
</div>