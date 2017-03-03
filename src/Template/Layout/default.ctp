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

   <!--  <?//= $this->Html->css('base.css') ?>
    <?//= $this->Html->css('cake.css') ?> -->

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
   
   
    <?php echo  $this->Html->css(array(
        'fonts_googleapis',
        'assets/plugins/jquery-ui/jquery-ui.min',
        'assets/plugins/pace-master/themes/blue/pace-theme-flash',
        // 'assets/plugins/uniform/css/uniform.default.min',
        'assets/plugins/bootstrap/css/bootstrap.min',
        'assets/plugins/fontawesome/css/font-awesome',
        // 'assets/plugins/line-icons/simple-line-icons',
        'assets/plugins/offcanvasmenueffects/css/menu_cornerbox',
        'assets/plugins/waves/waves.min',
        'assets/plugins/switchery/switchery.min',
        'assets/plugins/3d-bold-navigation/css/style',
        'assets/plugins/slidepushmenus/css/component',
        // 'assets/plugins/weather-icons-master/css/weather-icons.min',
        // 'assets/plugins/metrojs/MetroJs.min',
        'assets/plugins/toastr/toastr.min',
        // 'assets/plugins/datatables/css/jquery.datatables.min',
        // 'assets/plugins/datatables/css/jquery.datatables_themeroller',
        // 'assets/plugins/x-editable/bootstrap3-editable/css/bootstrap-editable',
        'assets/plugins/bootstrap-datepicker/css/datepicker3',
        'assets/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker_new',
        'assets/plugins/ion.rangeslider/css/ion.rangeSlider',
        'assets/plugins/ion.rangeslider/css/ion.rangeSlider.skinFlat.css',
        // Theme Styles
        'assets/plugins/summernote-master/summernote',
        'assets/plugins/icheck/all',
        // 'assets/plugins/chosen/chosen',
        'assets/css/modern',
        'assets/css/themes/green','libs/bootstrap-select',
        'custom',
        // 'handsontable.full',
        'assets/plugins/fancybox/jquery.fancybox',
        'assets/plugins/fancybox/jquery.fancybox-thumbs',
        // 'assets/plugins/select2/css/select2.min'
        'assets/plugins/daterangepicker/daterangepicker',
    )); ?>
   
    <!-- Theme Styles -->
    <?php echo $this->Html->script(array(
        'assets/plugins/3d-bold-navigation/js/modernizr',
        'assets/plugins/offcanvasmenueffects/js/snap.svg-min',
    )); ?>
   
</head>
<body class="page-horizontal-bar compact-menu ">
   
    <?php echo $this->element('menu-wrap'); ?>
        <main class="page-content content-wrap">
            <?php echo $this->element('navbar') ?>
            <?php echo $this->element('page-sidebar') ?>
            <div class="page-inner">
                <?= $this->Flash->render() ?>
                <?php echo $this->element('breadcrumbs') ?>
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
 
<?php echo $this->Html->script(array(
    'assets/plugins/jquery/jquery-2.1.4.min',
    'assets/plugins/jquery-ui/jquery-ui.min',
    'assets/plugins/pace-master/pace.min',
    'libs/ckeditor/ckeditor',
    'assets/plugins/jquery-blockui/jquery.blockui',
    'assets/plugins/bootstrap/js/bootstrap.min',
    'assets/plugins/jquery-slimscroll/jquery.slimscroll.min',
    'assets/plugins/switchery/switchery.min',
    'assets/plugins/uniform/jquery.uniform.min',
    // 'assets/plugins/offcanvasmenueffects/js/classie',
    'assets/plugins/offcanvasmenueffects/js/main',
    'assets/plugins/waves/waves.min',
    'assets/plugins/3d-bold-navigation/js/main',
    // 'assets/plugins/waypoints/jquery.waypoints.min',
    'assets/plugins/jquery-counterup/jquery.counterup.min', // Menu
    'assets/plugins/toastr/toastr.min',
    // 'assets/plugins/flot/jquery.flot.min',
    // 'assets/plugins/flot/jquery.flot.time.min',
    // 'assets/plugins/flot/jquery.flot.symbol.min',
    // 'assets/plugins/flot/jquery.flot.resize.min',
    // 'assets/plugins/flot/jquery.flot.tooltip.min',
    // 'assets/plugins/curvedlines/curvedLines',
    'assets/plugins/metrojs/MetroJs.min',
    // 'assets/plugins/chosen/chosen.jquery.min',
    'assets/plugins/icheck/icheck.min',
    // 'assets/plugins/select2/js/select2.min',
    'assets/js/modern.min',
    // 'assets/js/pages/form-select2',
    // 'assets/plugins/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min',
    // 'assets/plugins/jquery-validation/jquery.validate.min',
    // 'assets/js/pages/form-wizard',
    'assets/plugins/ion.rangeslider/js/ion-rangeSlider/ion.rangeSlider.min',
    // Table
    // 'assets/plugins/jquery-mockjax-master/jquery.mockjax',
    // 'assets/plugins/moment/moment',
    // 'assets/plugins/datatables/js/jquery.datatables.min',
    // 'assets/plugins/x-editable/bootstrap3-editable/js/bootstrap-editable',
    'assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker',
    'assets/plugins/bootstrap-datepicker/js/moment-with-locales',
    'assets/plugins/bootstrap-datepicker/js/bootstrap-datetimepicker',
    // 'assets/js/pages/table-data',
    'assets/plugins/autoNumeric/autoNumeric.js',
    'libs/bootstrap-select',
    // End table
    'assets/plugins/summernote-master/summernote.min',
    'assets/plugins/elevatezoom/jquery.elevatezoom-3.0.8.min',
    'assets/plugins/fancybox/jquery.fancybox',
    'assets/plugins/fancybox/jquery.fancybox-thumbs',
    'assets/js/pages/ui-sliders',
    'assets/plugins/daterangepicker/daterangepicker',
    'assets/plugins/livesearch/vendor/jquery.hideseek.min',
    'assets/plugins/livesearch/initializers',
    'custom'
    // 'assets/js/pages/dashboard',
    // 'handsontable_custom.js',
    // 'assets/plugins/handsontable/handsontable.full'
)); ?>

</body>
</html>
