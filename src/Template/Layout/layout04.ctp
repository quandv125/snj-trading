<!-- Layout layout04 -->
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
    <!-- CSS -->
    <!-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet'> -->
    <?= $this->Html->css([
        'libs/font-awesome.min',
        'libs/font-linearicons',
        'libs/bootstrap',
        'libs/bootstrap-theme',
        'libs/jquery.fancybox',
        'libs/jquery-ui',
        'libs/owl.carousel',
        'libs/owl.transitions',
        'libs/owl.theme',
        'libs/query.mCustomScrollbar',
        'libs/settings',
        'theme',
        'responsive'
    ])?>
    <?= $this->Html->script([
        'libs/jquery-3.1.1.min',
        'libs/bootstrap.min',
        'libs/jquery.fancybox',
        'libs/jquery-ui',
        'libs/owl.carousel',
        'libs/TimeCircles',
        'libs/jquery.countdown',
        'libs/jquery.bxslider.min',
        'libs/jquery.mCustomScrollbar.concat.min',
        'libs/jquery.themepunch.revolution',
        'libs/jquery.themepunch.plugins.min',
        'assets/plugins/toastr/toastr.min',
        'theme',
        // 'custom',
    ]); ?>
</head>
<body>
    <div class="wrap">
        <div id="header">
            <?= $this->element('font-end/header'); ?>
        </div>
        <!-- End Header -->
        <div id="content">
            <div class="container">
                
                <?= $this->element('font-end/categories',['categories'=>$categories]); ?>
                <div class="clearfix divider25"></div>
                <?= $this->element('font-end/shipping'); ?>

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
    <div id="menufix">
        <?= $this->element('font-end/menu_dropdow',['categories'=>$categories]) ?>
    </div>

 <div id="overlay">
        <div id="progstat"></div>
        <div id="progress"></div>
    </div>
</body>
</html>

