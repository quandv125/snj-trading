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
    <!-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet'> -->
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
        'theme',
    ]); ?>
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
        <span id="back-to-top"><?= $this->Html->image('back-to-top.png') ?></span>
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
