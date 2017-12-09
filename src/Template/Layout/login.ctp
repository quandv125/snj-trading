<?php
$cakeDescription = 'S&J Trading Company';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
   
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
	
	<?php echo  $this->Html->css(array(
		'assets/plugins/pace-master/themes/blue/pace-theme-flash',
		'assets/plugins/uniform/css/uniform.default.min',
		'assets/plugins/bootstrap/css/bootstrap.min',
		'assets/plugins/fontawesome/css/font-awesome',
		'assets/css/modern.min',
		'assets/css/themes/green',
	)); ?>

</head>

<body class="page-login">
		<main class="page-content">
			<?= $this->Flash->render() ?>
			<?= $this->fetch('content') ?>
		</main><!-- Page Content -->
<?php echo $this->Html->script(array(
		'assets/plugins/jquery/jquery-2.1.4.min',
		'assets/plugins/jquery-ui/jquery-ui.min',
		'assets/plugins/pace-master/pace.min',
		// 'custom'
	)); ?>
</body>
</html>
