
<div id="header">
	<div class="header3 header5">
		<div class="container">
			<div class="row">
				<div class="col-md-2 col-sm-2 col-xs-12">
					<div class="logo5">
						<h1 class="hidden">Super Shop</h1>
						<?php echo $this->Html->image('logo.png',['url'=>['controller'=> 'pages','action' =>'index'],'width'=>'100%']) ?>
					</div>
				</div>
				<div class="col-md-6 col-sm-10 col-xs-12">
					<div class="smart-search search-form3 search-form5">
						<?php echo $this->element('font-end/smart-search') ?>
					</div>
				</div>
				
				<div class="col-md-4 col-sm-12 col-xs-12">
					<div class="wrap-cart-info3">
						<ul class="top-info top-info3">
							<li class="top-account has-child">
								<!-- <a href="#"><i class="fa fa-user"></i> ADMIN</a> -->
								<?php echo $this->element('font-end/top_accounts') ?>
							</li>
							<li class="top-language has-child">
								<a class="language-selected" href="#">
								    <?php 
								        if ($this->request->session()->read('Config.language') == NULL) {
								            echo $this->Html->image('flags/en.png',['class'=>"position-left"]);
								        } else {
								            echo $this->Html->image('flags/'.$this->request->session()->read('Config.language').'.png',['class'=>"position-left"]);
								        } 
								        echo ($this->request->session()->read('Config.language') == 'vn') ? '  ':'  ';
								    ?>
								</a>
								<ul class="sub-menu-top">
								   <li>
								        <?= $this->Html->link($this->Html->image('flags/vn.png').' VietNam', ['action' => 'changeLang', 'vn'], ['escape' => false, 'class' => 'position-left']); ?>
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
	                    <h2 class="title-category-dropdown"><span>Categories</span></h2>
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
	<!-- End Main Nav -->
</div>


<!-- SlideShow -->

<div class="banner-slider banner-slider21 slider-home3 bg-slider">
	<div class="wrap-item" data-pagination="true" data-autoplay="true" data-transition="fade" data-navigation="true" data-itemscustom="[[0,1]]">
		<div class="item-slider">
			<div class="banner-thumb">
				<a href="#"><img src="img/images/home18/slide2.jpg" style="min-height: 570px;" class="img-responsive" alt="" /></a>
			</div>
			<div class="banner-info text-center animated" data-animated="bounceIn">
				<h3>Samsung </h3>
				<h2>Galaxy S7 Edge</h2>
			</div>
		</div>
		<div class="item-slider">
			<div class="banner-thumb"><a href="#"><img src="img/images/home18/slide2.jpg" style="min-height: 570px;" class="img-responsive" alt="" /></a></div>
			<div class="banner-info text-center animated" data-animated="bounceIn">
				<h3>laptop </h3>
				<h2>dell xps 501</h2>
			</div>
		</div>
		<div class="item-slider">
			<div class="banner-thumb"><a href="#"><img src="img/images/home18/slide2.jpg" style="min-height: 570px;" class="img-responsive" alt="" /></a></div>
			<div class="banner-info text-center animated" data-animated="bounceIn">
				<h3>Axon </h3>
				<h2>black & beg</h2>
			</div>
		</div>
	</div>
</div>