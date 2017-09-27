
<div id="header">
	<div class="header3 header5">
		<div class="container">
			<div class="row">
				<div class="col-md-2 col-sm-12 col-xs-12">
					<div class="logo5">
						<?php echo $this->Html->image('logo.png',['url'=>['controller'=> 'pages','action' => 'index'],'class'=>'img-responsive','width' => '100%']) ?>
					</div>
				</div>
				<div class="col-md-10 col-sm-12 col-xs-12" style="margin-top: 10px;">
					<div class="col-md-9 col-sm-12 col-xs-12">
						<div class="smart-search search-form3 search-form5">
							<?php echo $this->element('font-end/smart-search',['class' => 'smart-search']) ?>
						</div>
					</div>
					<div class="col-md-3 col-sm-12 col-xs-12">
						<div class="wrap-cart-info3">
							<ul class="top-info top-info3">
								<li class="top-account has-child">
									<?php echo $this->element('font-end/top_accounts') ?>
								</li>
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
							</ul>
							<?php echo $this->element('font-end/cart') ?>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="col-md-4 col-sm-4 col-xs-4">
						<span><?php echo $this->Html->image('flags/cal.png') ?></span>
						<span style="color: #ffffff;"><?php echo __("Delivery all day of the year") ?>  </span>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4">
						<span><?php echo $this->Html->image('flags/rocket.png') ?></span>
						<span style="color: #ffffff;"><?php echo __("Fast and accurate delivery service") ?> </span>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-4">
						<span><?php echo $this->Html->image('flags/support.png') ?></span>
						<span style="color: #ffffff;"><?php echo __("Customer Service Professional") ?> </span>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<!-- End Header 3 -->
	<!-- MENU -->
	<div class="header-nav bg-orange">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-3 col-xs-6 ">
				    <div class="category-dropdown hidden-category-dropdown">
				        <h2 class="title-category-dropdown"><span><?php echo __('Categories') ?></span></h2>
				        <div class="wrap-category-dropdown">
				            <ul class="list-category-dropdown">
				                <?= $this->element('font-end/Pages/vertical_menu'); ?>
				            </ul>
				            <a href="#" class="expand-category-link"></a>
				        </div> 
				    </div>
				</div>
				<div class="col-md-9 col-sm-9 col-xs-6">
					<?= $this->element('font-end/Pages/horizontal_menu'); ?>
				</div>
			</div>
		</div>
	</div>
	<!-- End Main Nav -->
</div>
<br/>
<!-- SlideShow -->
<!-- <div class="banner-slider banner-slider21 slider-home3 bg-slider">
	<div class="wrap-item" data-pagination="true" data-autoplay="true" data-transition="fade" data-navigation="true" data-itemscustom="[[0,1]]">
		<div class="item-slider">
			<div class="banner-thumb">
				<a href="#">
					<?php //echo $this->Html->image('gallery/s1.jpg') ?>
				</a>
			</div>
			<div class="banner-info text-center animated" data-animated="bounceIn">
				<span class="title-gallery">Vision </span>
				<br/><br/><br/>
				<div class="clearfix"></div>
				<span class="content-galley">Become a Global Service Provider. </span>
			</div>
		</div>
		<div class="item-slider">
			<div class="banner-thumb">
				<a href="#">
					<?php //echo $this->Html->image('gallery/s2.jpg') ?>
				</a>
			</div>
			<div class="banner-info text-center animated" data-animated="bounceIn">
				<span class="title-gallery">Equipment </span>
				<br/><br/><br/>
				<div class="clearfix"></div>
				<span class="content-galley">We provide high quality products </span>
			</div>
		</div>
		<div class="item-slider">
			<div class="banner-thumb">
				<a href="#">
					<?php //echo $this->Html->image('gallery/s4.jpg') ?>
				</a>
			</div>
			<div class="banner-info text-center animated" data-animated="bounceIn">
				<span class="title-gallery">Dependable </span>
				<br/><br/><br/>
				<div class="clearfix"></div>
				<span class="content-galley">S&J Trading has served customers for 10 years. </span>
			</div>
		</div>
	</div>
</div> -->