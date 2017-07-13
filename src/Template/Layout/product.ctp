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
	<?= $this->Html->script(['loader']); ?>
	<!-- CSS -->
  
	<?= $this->Html->css([
		'libs/font-awesome.min',
		'libs/font-linearicons',
		'libs/bootstrap.min',
		'libs/bootstrap-theme.min',
		'libs/jquery.fancybox',
		'libs/jquery-ui',
		'libs/owl.carousel',
		'libs/owl.transitions',
		'libs/owl.theme',
		'assets/plugins/toastr/toastr.min',
		'libs/query.mCustomScrollbar',
		'libs/settings',
		'assets/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker_new',
		'assets/plugins/handsometable/handsontable.full.min',
		'theme','libs/bootstrap-select',
		'libs/jquery.dataTables.min',
		'libs/kendo.default.min','libs/kendo.common.min',
		'responsive'
	])?>

	<?= $this->Html->script([
		'assets/plugins/jquery/jquery-2.1.4.min',
		'assets/plugins/jquery-ui/jquery-ui.min',
		'libs/ckeditor/ckeditor',
		'libs/bootstrap.min',
		'libs/jquery.fancybox',
		'libs/owl.carousel',
		// 'libs/TimeCircles',
		// 'libs/jquery.countdown',
		'libs/jquery.bxslider.min',
		'libs/jquery.mCustomScrollbar.concat.min',
		'libs/jquery.themepunch.revolution',
		'libs/jquery.themepunch.plugins.min',
		'libs/jquery.jcarousellite.min',
		'libs/jquery.elevatezoom',
		'assets/plugins/toastr/toastr.min',
		'assets/plugins/bootstrap-datepicker/js/moment-with-locales',
		'assets/plugins/bootstrap-datepicker/js/bootstrap-datetimepicker',
		'assets/plugins/handsometable/handsontable.full.min',
		'assets/plugins/livesearch/vendor/jquery.hideseek.min',
		'assets/plugins/livesearch/initializers',
		'libs/bootstrap-select',
		'libs/bootstrapvalidator.min',
		'libs/masonry.pkgd.min',
		'libs/jquery.dataTables',
		'libs/kendo.all.min',
		'libs/materialize',
		'theme',
	]); ?>
	<?php 
	// Start Angular
		echo $this->Html->script('myapp/lib/angular/angular.min.js');
		echo $this->Html->script('myapp/lib/angular/angular-route.min.js');
		echo $this->Html->script('myapp/lib/angular/angular-animate.min.js');
		echo $this->Html->script('myapp/lib/angular/angular-resource.min.js');
		echo $this->Html->script('myapp/lib/angular/angular-sanitize.min.js');
		echo $this->Html->script('myapp/angular-ckeditor.min.js');
		echo $this->Html->script('myapp/controllers/controllers.js');
		echo $this->Html->script('myapp/services/services.js');
		echo $this->Html->script('myapp/directives/directives.js');
		echo $this->Html->script('myapp/controllers/filters.js');
		// echo $this->Html->script('myapp/controllers/routes.js');
		echo $this->Html->script('myapp/app.js');
		// End Angular
	 ?>
	
</head>
<body>

<div class="wrap">
	<div id="header">
		<?= $this->element('font-end/Pages/header') ?>
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
				   <!--  <li>
						<a href="#/wishlist" class="btn-floating blue tooltipped" data-position="left" data-delay="10" data-tooltip="Wishlist">     <i class="fa fa-heart-o"></i>
						</a>
					</li> -->
				</ul>
			</div>
		<?php endif ?>
		
		<?= $this->element('font-end/footer') ?>
	</div>
	<!-- End Footer -->
</div>
<div id="menufix">
	<?= $this->element('font-end/menu_dropdow',['categories'=>$categories]) ?>
</div>
	<?php echo $this->Html->image('loader.gif',['class' => 'loader3', "style"=>"display: none;"]) ?>
</body>
</html>
