<!-- Layout default -->
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

   <!--  <?//= $this->Html->css('base.css') ?>
    <?//= $this->Html->css('cake.css') ?> -->

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
   
   
    <?php echo  $this->Html->css(array(
        'fonts_googleapis',
        'assets/plugins/jquery-ui/jquery-ui.min',
        'assets/plugins/pace-master/themes/blue/pace-theme-flash',
        'assets/plugins/bootstrap/css/bootstrap.min',
        'assets/plugins/fontawesome/css/font-awesome',
        'assets/plugins/offcanvasmenueffects/css/menu_cornerbox',
        'assets/plugins/waves/waves.min',
        'assets/plugins/switchery/switchery.min',
        'assets/plugins/3d-bold-navigation/css/style',
        'assets/plugins/slidepushmenus/css/component',
        'assets/plugins/toastr/toastr.min',
        'assets/plugins/bootstrap-datepicker/css/datepicker3',
        'assets/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker_new',
        'assets/plugins/ion.rangeslider/css/ion.rangeSlider',
        'assets/plugins/ion.rangeslider/css/ion.rangeSlider.skinFlat.css',
        // Theme Styles
        'assets/plugins/summernote-master/summernote',
        'assets/plugins/icheck/all',
        'assets/css/modern',
        'assets/css/themes/green','libs/bootstrap-select',
        'custom',
        'assets/plugins/fancybox/jquery.fancybox',
        'assets/plugins/fancybox/jquery.fancybox-thumbs',
        'assets/plugins/daterangepicker/daterangepicker', 'libs/kendo.default.min','libs/kendo.common.min',
    )); ?>
   
    <!-- Theme Styles -->
    <?php echo $this->Html->script(array(
        'assets/plugins/3d-bold-navigation/js/modernizr',
        'assets/plugins/offcanvasmenueffects/js/snap.svg-min',
    )); ?>
   
    <?php echo $this->Html->script(array(
        'assets/plugins/jquery/jquery-2.1.4.min',
        'assets/plugins/jquery-ui/jquery-ui.min',
        'assets/plugins/pace-master/pace.min',
        // 'assets/plugins/jquery-blockui/jquery.blockui',
        'assets/plugins/bootstrap/js/bootstrap.min',
        'assets/plugins/jquery-slimscroll/jquery.slimscroll.min',
        'assets/plugins/switchery/switchery.min',
        'assets/plugins/uniform/jquery.uniform.min',
        // 'assets/plugins/offcanvasmenueffects/js/main',
        'assets/plugins/waves/waves.min',
        // 'assets/plugins/3d-bold-navigation/js/main',
        'assets/plugins/jquery-counterup/jquery.counterup.min', // Menu
        'assets/plugins/toastr/toastr.min',
        // 'assets/plugins/metrojs/MetroJs.min',
        'assets/plugins/icheck/icheck.min',
        'assets/js/modern.min',
        'assets/plugins/ion.rangeslider/js/ion-rangeSlider/ion.rangeSlider.min',
        // Table
        'assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker',
        'assets/plugins/bootstrap-datepicker/js/moment-with-locales',
        'assets/plugins/bootstrap-datepicker/js/bootstrap-datetimepicker',
        // 'assets/plugins/autoNumeric/autoNumeric.js',
        'libs/bootstrap-select',
        // End table
        'assets/plugins/summernote-master/summernote.min',
        // 'assets/plugins/elevatezoom/jquery.elevatezoom-3.0.8.min',
        'assets/plugins/fancybox/jquery.fancybox',
        'assets/plugins/fancybox/jquery.fancybox-thumbs',
        'assets/js/pages/ui-sliders',
        'assets/plugins/daterangepicker/daterangepicker',
        'assets/plugins/livesearch/vendor/jquery.hideseek.min',
        'assets/plugins/livesearch/initializers','libs/kendo.all.min',
        'libs/angular.min',
        'myapp',
        'custom'
        
       
    )); ?>
     
</head>
<body class="page-horizontal-bar compact-menu">
   
    <?php echo $this->element('menu-wrap'); ?>
        <main class="page-content content-wrap">
            <?php echo $this->element('navbar') ?>
            <?php echo $this->element('page-sidebar') ?>
            <div class="page-inner">
                
                <?php echo $this->element('breadcrumbs') ?>
                <?= $this->Flash->render() ?>
                <div id="main-wrapper">
                    <!--  -->         
                    <!--  -->
                    <?= $this->fetch('content') ?>
                </div><!-- Main Wrapper -->
                <?php echo $this->element('footer') ?>
            </div><!-- Page Inner -->
        </main><!-- Page Content -->
       
    <?php echo $this->element('nav-container'); ?>
    <?php echo $this->Html->image('loader.gif',['id' => 'loader', "style"=>"display: none;"]) ?>
 

</body>
</html>
