<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
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
		// Theme Styles
		'assets/css/modern.min',
		'assets/css/themes/green',
		// 'assets/css/custom',
		
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
