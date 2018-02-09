
<div class="container1" style="padding: 0px 20px;">
	<div class="sub-header4">
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12">
				<ul class="top-info top-info-left">
					<li class="top-contact">
						<p><i class="fa fa-phone"></i> Call us: 020 2366 455</p>
					</li>
				  
				</ul>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="top-info">
					<ul class="top-info top-info-left">

						<li class="top-account has-child">
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
										echo ($this->request->session()->read('Config.language') == 'kr') ? ' Korea ':' English ';
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
						<li class="top-contact">
							<p><!-- <i class="fa fa-heart"></i> Wishlist --></p>
						</li>
						<li class="top-contact">
							<p><!-- <i class="fa fa-arrow-circle-o-right"></i>Checkout --></p>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- End Sub Header 2 -->
	<div class="header4">
		<div class="row">
			<div class="col-md-3 col-sm-3 col-xs-6">
				<div class="logo4">
					<?php echo $this->Html->image('logo.png',['url'=>['controller'=> 'pages','action' => 'index'],'class'=>'img-responsive text','width' => '50%']) ?>
				</div>
			</div>
			<div class="col-md-6 col-sm-7 col-xs-12">
				<div class="smart-search search-form14">
					<?php echo $this->element('font-end/smart-search',['class'=>'smart-search-fixed']) ?>
				</div>
			</div>
			<div class="col-md-3 col-sm-2 col-xs-12">
				<div class="wrap-register-cart">
					<?php echo $this->element('font-end/cart') ?>
					
				</div>
			</div>
		</div>
	</div>
	<!-- End Header2 -->
</div>
<div class="header-nav2 header-nav4">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-sm-12 col-xs-12 col-md-offset-3">
			   <?= $this->element('font-end/Pages/horizontal_menu',['categories2' => $categories2]); ?>
			</div>
		</div>
	</div>
</div>
<!-- End Main Nav2 -->