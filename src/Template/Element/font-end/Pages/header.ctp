
<div class="top-header">
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-4 col-xs-12">
				<ul class="top-info" id="top-info">
					<li><a href="#">About S&J</a></li>
					<li><a href="#">History</a></li>
					<li><?php echo $this->Html->link(__('Contact Us'), ['controller' => 'pages', 'action' => 'contacts']) ?></li>
				</ul>
			</div>
			<div class="col-md-9 col-sm-8 col-xs-12">
				<ul class="top-info">
					<li class="top-account has-child">
						  <?php echo $this->element('font-end/top_accounts') ?>
					</li>
					<!-- <li class="top-help has-child">
						<a href="#">Help</a>
						<ul class="sub-menu-top">
							<li><a href="#">Help Center</a></li>
							<li><a href="#">Submit A Complaint</a></li>
						</ul>
					</li>
					<li class="top-mobile"><a href="#">Mobile </a></li> -->
					<li class="top-language has-child">
							<a class="language-selected" href="#">
								<?php 
									if ($this->request->session()->read('Config.language') == NULL) {
										echo $this->Html->image('flags/kr.png',['class'=>"position-left"]);
									} else {
										echo $this->Html->image('flags/'.$this->request->session()->read('Config.language').'.png',['class'=>"position-left"]);
									} 
								?>
							</a> 
							<ul class="sub-menu-top">
							   <li>
									<?= $this->Html->link($this->Html->image('flags/kr.png').' Korea', ['action' => 'changeLang', 'kr'], ['escape' => false, 'class' => 'position-left']); ?>
								</li>
								<li>
									<?= $this->Html->link($this->Html->image('flags/en.png').' English', ['action' => 'changeLang', 'en'], ['escape' => false, 'class' => 'position-left']); ?>
								</li>
							</ul>
					</li>
					<!-- <li class="top-currency has-child">
						<a href="#" class="currency-selected">USD</a>
						<ul class="sub-menu-top">
							<li><a href="#"><span>€</span>EUR</a></li>
							<li><a href="#"><span>¥</span>JPY</a></li>
							<li><a href="#"><span>$</span>USD</a></li>
						</ul>
					</li> -->
				</ul>
			</div>
		</div>
	</div>
</div>

<!-- End Top Header -->
<div class="header">
	<div class="container">
		<div class="header-main">
			<div class="row">
				<div class="col-md-2 col-sm-12 col-xs-12">
					<div class="logo5">
						<?php echo $this->Html->image('logo.png',['url'=>['controller'=> 'pages','action' => 'index'],'class'=>'img-responsive','width' => '100%']) ?>
					</div>
				</div>
				<div class="col-md-10 col-sm-12 col-xs-12" style="margin-top: 10px;">
					<div class="col-md-9 col-sm-10 col-xs-10">
						 <div class="smart-search search-form14">
							<?php echo $this->element('font-end/smart-search',['class'=>'smart-search']) ?>
						</div>
					</div>
					<div class="col-md-3 col-sm-2 col-xs-2">
						<div class="wrap-cart-info3_1">
							<?php echo $this->element('font-end/cart') ?>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="col-md-4 col-sm-4 col-xs-4">
						<span><?php echo $this->Html->image('flags/cal.png') ?></span>
						<span><?php echo __("Delivery all day of the year") ?>  </span>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4">
						<span><?php echo $this->Html->image('flags/rocket.png') ?></span>
						<span><?php echo __("Fast and accurate delivery service") ?> </span>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4">
						<span><?php echo $this->Html->image('flags/support.png') ?></span>
						<span><?php echo __("Customer Service Professional") ?> </span>
					</div>
				</div>

			</div>
		</div>
	</div>
	<div class="header-nav bg-orange">
		<div class="container">
			<div class="col-md-3 col-sm-3 col-xs-6">
				<div class="category-dropdown hidden-category-dropdown">
					<h2 class="title-category-dropdown"><span><?php echo __('Categories') ?></span></h2>
					<div class="wrap-category-dropdown">
						<ul class="list-category-dropdown">
							<?= $this->element('font-end/Pages/vertical_menu'); ?>
						</ul>
						<a href="#" class="expand-category-link"></a>
					</div>
				</div>
				<!-- End Category Dropdown -->
			</div>
			<div class="col-md-9 col-sm-9 col-xs-6">
				<?= $this->element('font-end/Pages/horizontal_menu'); ?>
			</div>
		</div>
	</div>
</div>
<!-- End Header -->