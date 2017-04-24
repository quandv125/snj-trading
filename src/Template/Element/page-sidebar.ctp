<div class="sidebar horizontal-bar">
<!-- <div class="page-sidebar sidebar"> -->
    <div class="page-sidebar-inner slimscroll">
        <div class="sidebar-header">
            <div class="sidebar-profile">
                <a href="javascript:void(0);" id="profile-menu-link">
                    <div class="sidebar-profile-image">
                    <?php 
                        if (!empty($user_info['thumbnail'])) {
                            echo $this->Html->image($user_info['thumbnail'],array('class'=>'img-circle avatar','width'=>'60', 'height' => '60'));
                        } else {
                            echo $this->Html->image('avatars/no-avatar.gif',array('class'=>'img-circle avatar','width'=>'30', 'height' => '30'));
                        }
                    ?>
                    </div>
                    <div class="sidebar-profile-details">
                        <span><?= $user_info['username'] ?><br><small><?= $user_info['fullname'] ?></small></span>
                    </div>
                </a>
            </div>
        </div>
        <ul class="menu accordion-menu">
            <li class="active"> 
                <?= $this->Html->link('<span class="menu-icon glyphicon glyphicon-home"></span><p>'.__('Home').'</p>',array('controller'=>'pages','action'=>'display','home'),array('escape' => false,'class'=>'waves-effect waves-button')) ?>
            </li>
            <li>
                <?= $this->Html->link('<i class="menu-icon fa fa-cubes"></i><p>'.__('Products').'</p>',array('controller'=>'products','action'=>'index'),array('escape' => false,'class'=>'waves-effect waves-button')) ?>
            </li>
            <li>
                <?= $this->Html->link('<span class="menu-icon glyphicon glyphicon-shopping-cart"></span><p>'.__('Inquiries').'</p>',array('controller'=>'Inquiries','action'=>'Inquiries'),array('escape' => false,'class'=>'waves-effect waves-button')) ?>
            </li>
          <!--   <li>
                <?= $this->Html->link('<i class="menu-icon fa fa-newspaper-o"></i><p>'.__('Articles').'</p>',array('controller'=>'Articles','action'=>'index'),array('escape' => false,'class'=>'waves-effect waves-button')) ?>
            </li> -->
            <!-- <li class="droplink">
                <a href="#" class="waves-effect waves-button">
                    <span class="menu-icon glyphicon glyphicon-transfer"></span><p><?= __('Transactions') ?></p><span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <?= $this->Html->link('<span class="menu-icon glyphicon glyphicon-shopping-cart"></span><p>'.__('Sales').'</p>',array('controller'=>'Products','action'=>'sales'),array('escape' => false,'class'=>'waves-effect waves-button')) ?>
                    </li>
                    <li>
                        <?= $this->Html->link('<span class="menu-icon glyphicon glyphicon-bell"></span><p>'.__('Orders').'</p>',array('controller'=>'users','action'=>'index'),array('escape' => false,'class'=>'waves-effect waves-button')) ?>
                    </li>
                    <li>
                        <?= $this->Html->link('<span class="menu-icon glyphicon glyphicon-list-alt"></span><p>'.__('Invoices').'</p>',array('controller'=>'Invoices','action'=>'index'),array('escape' => false,'class'=>'waves-effect waves-button')) ?>
                    </li>
                    <li>
                        <?= $this->Html->link('<span class="menu-icon glyphicon glyphicon-retweet"></span><p>'.__('Returns').'</p>',array('controller'=>'users','action'=>'index'),array('escape' => false,'class'=>'waves-effect waves-button')) ?>
                    </li>
                    <li>
                        <?= $this->Html->link('<span class="menu-icon glyphicon glyphicon-th"></span><p>'.__('Stock Orders').'</p>',array('controller'=>'stocks','action'=>'index'),array('escape' => false,'class'=>'waves-effect waves-button')) ?>
                    </li>
                    <li>
                        <?= $this->Html->link('<span class="menu-icon glyphicon glyphicon-repeat"></span><p>'.__('Stock Returns').'</p>',array('controller'=>'users','action'=>'index'),array('escape' => false,'class'=>'waves-effect waves-button')) ?>
                    </li>
                </ul>
            </li>
            <li class="droplink">
                <a href="#" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-globe"></span><p><?= __('Partners') ?></p><span class="arrow"></span></a>
                <ul class="sub-menu">
                    <li>
                        <?= $this->Html->link('<span class="menu-icon glyphicon glyphicon-user"></span><p>'.__('Customers').'</p>',array('controller'=>'Customers','action'=>'index'),array('escape' => false,'class'=>'waves-effect waves-button')) ?>
                    </li>
                     <li>
                        <?= $this->Html->link('<span class="menu-icon glyphicon glyphicon-cloud"></span><p>'.__('Suppliers').'</p>',array('controller'=>'Suppliers','action'=>'index'),array('escape' => false,'class'=>'waves-effect waves-button')) ?>
                    </li>
                     <li>
                        <?= $this->Html->link('<span class="menu-icon glyphicon glyphicon-plane"></span><p>'.__('Partner Deliverys ').'</p>',array('controller'=>'partner_deliverys','action'=>'index'),array('escape' => false,'class'=>'waves-effect waves-button')) ?>
                    </li>
                </ul>
            </li> -->
            <li>
                <?= $this->Html->link('<span class="menu-icon glyphicon glyphicon-tasks"></span><p>'.__('Menu').'</p>',array('controller'=>'categories','action'=>'index'),array('escape' => false,'class'=>'waves-effect waves-button')) ?>
            </li>
            <!-- <li>
                <?= $this->Html->link('<span class="menu-icon glyphicon glyphicon-plane"></span><p>'.__('Partner Deliverys ').'</p>',array('controller'=>'partner_deliverys','action'=>'index'),array('escape' => false,'class'=>'waves-effect waves-button')) ?>
            </li> -->
           <!--  <li class="droplink">
                <a href="#" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-signal"></span><p><?= __('Report') ?></p><span class="arrow"></span></a>
                <ul class="sub-menu">
                    <li>
                         <?= $this->Html->link('<span class="menu-icon glyphicon glyphicon-user"></span><p>'.__('Day End').'</p>',array('controller'=>'users','action'=>'index'),array('escape' => false,'class'=>'waves-effect waves-button')) ?>
                    </li>
                    <li>
                         <?= $this->Html->link('<span class="menu-icon glyphicon glyphicon-user"></span><p>'.__('Sales').'</p>',array('controller'=>'users','action'=>'index'),array('escape' => false,'class'=>'waves-effect waves-button')) ?>
                    </li>
                    <li>
                         <?= $this->Html->link('<span class="menu-icon glyphicon glyphicon-user"></span><p>'.__('Orderd').'</p>',array('controller'=>'users','action'=>'index'),array('escape' => false,'class'=>'waves-effect waves-button')) ?>
                    </li>
                    <li>
                         <?= $this->Html->link('<span class="menu-icon glyphicon glyphicon-user"></span><p>'.__('Product').'</p>',array('controller'=>'users','action'=>'index'),array('escape' => false,'class'=>'waves-effect waves-button')) ?>
                    </li>
                    <li>
                         <?= $this->Html->link('<span class="menu-icon glyphicon glyphicon-user"></span><p>'.__('Customer').'</p>',array('controller'=>'users','action'=>'index'),array('escape' => false,'class'=>'waves-effect waves-button')) ?>
                    </li>
                    <li>
                         <?= $this->Html->link('<span class="menu-icon glyphicon glyphicon-user"></span><p>'.__('Supllier').'</p>',array('controller'=>'users','action'=>'index'),array('escape' => false,'class'=>'waves-effect waves-button')) ?>
                    </li>
                    <li>
                         <?= $this->Html->link('<span class="menu-icon glyphicon glyphicon-user"></span><p>'.__('User').'</p>',array('controller'=>'users','action'=>'index'),array('escape' => false,'class'=>'waves-effect waves-button')) ?>
                    </li>
                    <li>
                         <?= $this->Html->link('<span class="menu-icon glyphicon glyphicon-user"></span><p>'.__('Financial').'</p>',array('controller'=>'users','action'=>'index'),array('escape' => false,'class'=>'waves-effect waves-button')) ?>
                    </li>
                </ul>
            </li> -->
            <li class="droplink">
                <a href="#" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-flash"></span><p><?= __('Permission') ?></p><span class="arrow"></span></a>
                <ul class="sub-menu">
                    <li>
                        <?= $this->Html->link('<i class="menu-icon fa fa-group"></i><p>'.__('Group').'</p>',array( 'controller' => 'users','action' => 'permission'),array('escape' => false,'class'=>'waves-effect waves-button')) ?>
                    </li>
                    <li>
                         <?= $this->Html->link('<span class="menu-icon glyphicon glyphicon-user"></span><p>'.__('User').'</p>',array('controller'=>'users','action'=>'index'),array('escape' => false,'class'=>'waves-effect waves-button')) ?>
                    </li>
                </ul>
            </li>
        </ul>
    </div><!-- Page Sidebar Inner -->
</div><!-- Page Sidebar -->