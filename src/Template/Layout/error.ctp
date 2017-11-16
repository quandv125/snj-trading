

<!DOCTYPE html>
<html>
<head>
<title>404</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="404 Error" />
<link href="https://p.w3layouts.com/demos_new/template_demo/28-06-2017/elegant_error_page-demo_Free/1202549426/web/css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
    <div class="agileits-main"> 
        <div class="agileinfo-row">
                
            <div class="w3layouts-errortext">
                <h2>4<span>0</span>4</h2>
                
                <h1>Sorry! The page you were looking for could not be found </h1>
                
                <h1><?= $this->Html->link(__('Back'), 'javascript:history.back()') ?></h1>
            </div>  
        </div>  
    </div>  
</body>
</html>

<!-- 
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <div id="container">
        <div id="header">
            <h1><?= __('Error') ?></h1>
        </div>
        <div id="content">
            <?= $this->Flash->render() ?>

            <?= $this->fetch('content') ?>
        </div>
        <div id="footer">
            <?= $this->Html->link(__('Back'), 'javascript:history.back()') ?>
        </div>
    </div>
</body>
</html>
 -->