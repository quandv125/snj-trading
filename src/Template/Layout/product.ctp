<!-- Layout product -->
<?php $cakeDescription = 'S&J Trading Company'; ?>
<!DOCTYPE html>
<html>
<head>
	<?= $this->Html->charset() ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="S&J Trading" />
	<meta name="robots" content="noodp,index,follow" />
	<meta name='revisit-after' content='1 days' />
	<title>
		<?= $cakeDescription ?>:
		<?= $this->fetch('title') ?>
	</title>
	<?= $this->Html->meta('icon') ?>
	<!-- <?= $this->Html->css('base.css') ?>
	<?= $this->Html->css('cake.css') ?> -->
	<?= $this->fetch('meta') ?>
	<?= $this->fetch('css') ?>
	<?= $this->fetch('script') ?>
	<!-- <?php //echo $this->Html->script(['loader']); ?> -->
	<!-- CSS -->
	 <?= $this->Html->script(['loader' ]); ?>
	<?php 
		echo $this->Html->css('libs/font-awesome.min');
		echo $this->Html->css('libs/font-linearicons');
		echo $this->Html->css('libs/bootstrap.min');
		echo $this->Html->css('libs/bootstrap-theme.min');
		echo $this->Html->css('libs/jquery.fancybox');
		echo $this->Html->css('libs/jquery-ui');
		echo $this->Html->css('libs/owl.carousel');
		echo $this->Html->css('libs/owl.transitions');
		echo $this->Html->css('libs/owl.theme');
		echo $this->Html->css('assets/plugins/toastr/toastr.min');
		echo $this->Html->css('libs/query.mCustomScrollbar');
		echo $this->Html->css('libs/settings');
		echo $this->Html->css('assets/plugins/bootstrap-datepicker/css/daterangepicker');
		echo $this->Html->css('assets/plugins/handsometable/handsontable.full.min');
		echo $this->Html->css('theme');
		// echo $this->Html->css('libs/bootstrap-select');
		echo $this->Html->css('libs/jquery.dataTables.min');
		echo $this->Html->css('libs/kendo.default.min');
		echo $this->Html->css('libs/kendo.common.min');
		echo $this->Html->css('libs/angular-material.min');
		echo $this->Html->css('responsive');
	?>
	
	<?php
		echo $this->Html->script('assets/plugins/jquery/jquery-2.1.4.min');
		echo $this->Html->script('assets/plugins/jquery-ui/jquery-ui.min');
		echo $this->Html->script('libs/ckeditor/ckeditor');
		echo $this->Html->script('libs/bootstrap.min');
		echo $this->Html->script('libs/jquery.fancybox');
		echo $this->Html->script('libs/owl.carousel');
		// echo $this->Html->script('libs/TimeCircles');
		// echo $this->Html->script('libs/jquery.countdown');
		// echo $this->Html->script('libs/jquery.bxslider.min');
		// echo $this->Html->script('libs/jquery.mCustomScrollbar.concat.min');
		// echo $this->Html->script('libs/jquery.themepunch.revolution');
		// echo $this->Html->script('libs/jquery.themepunch.plugins.min');
		echo $this->Html->script('libs/jquery.jcarousellite.min');
		echo $this->Html->script('libs/jquery.elevatezoom');
		echo $this->Html->script('libs/placeholderTypewriter');
		echo $this->Html->script('assets/plugins/toastr/toastr.min');
		// echo $this->Html->script('assets/plugins/bootstrap-datepicker/js/moment-with-locales');
		echo $this->Html->script('assets/plugins/bootstrap-datepicker/js/moment.min');
		echo $this->Html->script('assets/plugins/bootstrap-datepicker/js/daterangepicker');
		echo $this->Html->script('assets/plugins/handsometable/handsontable.full.min');
		echo $this->Html->script('assets/plugins/livesearch/vendor/jquery.hideseek.min');
		echo $this->Html->script('assets/plugins/livesearch/initializers');
		// echo $this->Html->script('libs/bootstrap-select');
		echo $this->Html->script('libs/bootstrapvalidator.min');
		// echo $this->Html->script('libs/masonry.pkgd.min');
		echo $this->Html->script('libs/jquery.dataTables');
		echo $this->Html->script('libs/kendo.all.min');
		if ($this->request->params['action'] != 'categories'){
			echo $this->Html->script('libs/materialize');
		}
		echo $this->Html->script('theme');
	?>
	
	<?php 
	// Start Angular
		echo $this->Html->script('myapp/lib/angular/angular.min.js');
		echo $this->Html->script('myapp/lib/angular/angular-route.min.js');
		echo $this->Html->script('myapp/lib/angular/angular-animate.min.js');
		echo $this->Html->script('myapp/lib/angular/angular-resource.min.js');
		echo $this->Html->script('myapp/lib/angular/angular-sanitize.min.js');
		echo $this->Html->script('myapp/lib/angular/angular-messages.min');
		echo $this->Html->script('myapp/lib/angular/angular-aria.min.js');
		echo $this->Html->script('myapp/lib/angular/angular-material.min');
		echo $this->Html->script('myapp/lib/angular/ngprogress.min.js');
		echo $this->Html->script('myapp/angular-ckeditor.min.js');
		echo $this->Html->script('myapp/services/services.js');
		echo $this->Html->script('myapp/directives/directives.js');
		echo $this->Html->script('myapp/controllers/filters.js');
		// echo $this->Html->script('myapp/controllers/routes.js');
		echo $this->Html->script('myapp/controllers/controllers.js');
		echo $this->Html->script('myapp/app.js');
	?>
	
</head>
<body>
<?= $this->element('font-end/Pages/header') ?>
<div class="wrap">
	<div id="header">
		<?php //echo $this->element('font-end/Pages/header') ?>
	</div>
	<div id="content">
		<div class="content-shop">
			<div class="container">
				<?= $this->Flash->render() ?>
				<?= $this->fetch('content') ?>
			</div>
		</div>
	</div>
	<div id="footer">
		<!-- <span id="back-to-top"><?= $this->Html->image('back-to-top.png') ?></span> -->
		<?php if (!empty($user_info) && $this->request->params['action'] == 'accounts'): ?>
			<div class="fixed-action-btn vertical" >
				<a class="btn-floating btn-large orange" id="">
					<i class="fa fa-bars" aria-hidden="true"></i>
				</a> 
				<ul>
					<li>
						<a href="#" class="btn-floating red tooltipped" data-position="left" data-delay="10" data-tooltip="Account"> 
							<i class="fa fa-user"></i>
						</a>
					</li>
					<li>
						<a href="#/products" class="btn-floating purple tooltipped" data-position="left" data-delay="10" data-tooltip="Product">    <i class="fa fa-cubes"></i>
						</a>
					<li>
						<a href="#/inquiry" class="btn-floating green tooltipped" data-position="left" data-delay="10" data-tooltip="Inquiry"> 
							<i class="fa fa-file-text-o"></i>
						</a>
					</li>
					<li>
						<a href="#/orders" class="btn-floating blue tooltipped" data-position="left" data-delay="10" data-tooltip="Orders">     <i class="fa fa-heart-o"></i>
						</a>
					</li>
				</ul>
			</div>
		<?php endif ?>
		
		<?= $this->element('font-end/footer') ?>
	</div>
	<!-- End Footer -->
</div>
<div id="overlay" class="loadbar">
        <div id="progstat"></div>
        <div id="progress"></div>
    </div>
<div id="menufix">
	<?= $this->element('font-end/menu_dropdow',['categories'=>$categories]) ?>
</div>
	<?php echo $this->Html->image('loader.gif',['class' => 'loader3', "style"=>"display: none;"]) ?>
</body>
</html>
