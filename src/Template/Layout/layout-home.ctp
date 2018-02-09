<!-- Layout layout-home -->

<?php $cakeDescription = 'S&J Trading Company'; ?>
<!DOCTYPE html>
<html>
<head>
	<?= $this->Html->charset() ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="Super Shop,7uptheme" />
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

	<?= $this->Html->script(['loader' ]); ?>
	<!-- CSS -->
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet'>
	<?= $this->Html->css([
		'libs/reset',
		'libs/font-awesome.min',
		'libs/font-linearicons',
		'libs/bootstrap.min',
		'libs/bootstrap-theme',
		'libs/jquery.fancybox',
		'libs/jquery-ui',
		'libs/owl.carousel',
		'libs/owl.transitions',
		'libs/owl.theme',
		// 'libs/query.mCustomScrollbar',
		'libs/settings',
		'theme',
		'responsive',
	])?>
	<!-- <link rel="stylesheet/less" type="text/css" href="/css/styles.less"> -->
	<?= $this->Html->script([
		'libs/jquery-3.1.1.min',
		'libs/bootstrap.min',
		// 'libs/jquery.fancybox',
		'libs/jquery-ui',
		'libs/owl.carousel',
		// 'libs/TimeCircles',
		// 'libs/jquery.countdown',
		'libs/jquery.bxslider.min',
		'libs/placeholderTypewriter',
		// 'libs/jquery.mCustomScrollbar.concat.min',
		// 'libs/jquery.themepunch.revolution',
		// 'libs/jquery.themepunch.plugins.min',
		// 'libs/less.min',
		'assets/plugins/jquery-slimscroll/jquery.slimscroll.min',
		'assets/plugins/toastr/toastr.min',
		'theme',
		// 'custom',
	]); ?>
	<script type="text/javascript">
		$("#myModal").modal();
	</script>
</head>
<body>
	<div class="wrap">
		<div id="header">
			<?= $this->element('font-end/header-home'); ?>
		</div>
		<!-- End Header -->
		<div id="content">
			<div class="container">
				<?php // echo $this->element('font-end/shipping'); ?>
				<?= $this->Flash->render() ?>
				<?= $this->fetch('content') ?>
			</div>
		</div>
		<div id="footer">
			<span id="back-to-top"><?= $this->Html->image('back-to-top.png') ?></span>
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
	<?= $this->Html->image('loader.gif',['id' => 'loader', "style"=>"display: none;"]) ?>
	<?= $this->Html->image('loader.gif',['class' => 'loader2', "style"=>"display: none;"]) ?>
</body>
</html>

