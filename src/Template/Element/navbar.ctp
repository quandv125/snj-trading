
 <div class="navbar">
    <div class="navbar-inner">
        <div class="sidebar-pusher">
            <a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        <div class="logo-box">
            
            <?php echo $this->Html->link('<span>S&J</span>',['controller'=>'Pages','action'=>'index'],['escape'=>false, 'class' => 'logo-text']) ?>
        </div><!-- Logo Box -->
        <div class="search-button">
            <a href="javascript:void(0);" class="waves-effect waves-button waves-classic show-search"><i class="fa fa-search"></i></a>
        </div>
        <div class="topmenu-outer">
            <div class="top-menu">
                <ul class="nav navbar-nav navbar-left">
                    <li>		
                        <a href="javascript:void(0);" class="waves-effect waves-button waves-classic sidebar-toggle"><i class="fa fa-bars"></i></a>
                    </li>
                   <!--  <li>
                        <a href="#cd-nav" class="waves-effect waves-button waves-red cd-nav-trigger"><i class="fa fa-diamond"></i></a>
                    </li>
                    <li>		
                        <a href="javascript:void(0);" class="waves-effect waves-button waves-red toggle-fullscreen"><i class="fa fa-expand"></i></a>
                    </li> -->
                    <!-- <li class="dropdown">
                        <a href="#" class="dropdown-toggle waves-effect waves-button waves-red" data-toggle="dropdown">
                            <i class="fa fa-cogs"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-md dropdown-list theme-settings" role="menu">
                            <li class="li-group">
                                <ul class="list-unstyled">
                                    <li class="no-link" role="presentation">
                                        Fixed Header 
                                        <div class="ios-switch pull-right switch-md" rel="fixed-header-check">
                                            <input type="checkbox" class="js-switch pull-right fixed-header-check" checked>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="li-group">
                                <ul class="list-unstyled">
                                    <li class="no-link" role="presentation">
                                        Fixed Sidebar 
                                        <div class="ios-switch pull-right switch-md" rel="fixed-sidebar-check">
                                            <input type="checkbox" class="js-switch pull-right fixed-sidebar-check" >
                                        </div>
                                    </li>
                                    <li class="no-link" role="presentation">
                                        Horizontal bar 
                                        <div class="ios-switch pull-right switch-md" rel="horizontal-bar-check">
                                            <input type="checkbox" class="js-switch pull-right horizontal-bar-check" checked>
                                        </div>
                                    </li>
                                    <li class="no-link" role="presentation">
                                        Toggle Sidebar 
                                        <div class="ios-switch pull-right switch-md" rel="toggle-sidebar-check">
                                            <input type="checkbox" class="js-switch pull-right toggle-sidebar-check">
                                        </div>
                                    </li>
                                    <li class="no-link" role="presentation">
                                        Compact Menu 
                                        <div class="ios-switch pull-right switch-md" rel="compact-menu-check">
                                            <input type="checkbox" class="js-switch pull-right compact-menu-check" checked>
                                        </div>
                                    </li>
                                    <li class="no-link" role="presentation">
                                        Hover Menu 
                                        <div class="ios-switch pull-right switch-md" rel="hover-menu-check">
                                            <input type="checkbox" class="js-switch pull-right hover-menu-check">
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="li-group">
                                <ul class="list-unstyled">
                                    <li class="no-link" role="presentation">
                                        Boxed Layout 
                                        <div class="ios-switch pull-right switch-md" rel="boxed-layout-check">
                                            <input type="checkbox" class="js-switch pull-right boxed-layout-check">
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="li-group">
                                <ul class="list-unstyled">
                                    <li class="no-link" role="presentation">
                                        Choose Theme Color
                                        <div class="color-switcher">
                                            <a class="colorbox color-blue" href="?theme=blue" title="Blue Theme" data-css="blue"></a>
                                            <a class="colorbox color-green" href="?theme=green" title="Green Theme" data-css="green"></a>
                                            <a class="colorbox color-red" href="?theme=red" title="Red Theme" data-css="red"></a>
                                            <a class="colorbox color-white" href="?theme=white" title="White Theme" data-css="white"></a>
                                            <a class="colorbox color-purple" href="?theme=purple" title="purple Theme" data-css="purple"></a>
                                            <a class="colorbox color-dark" href="?theme=dark" title="Dark Theme" data-css="dark"></a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="no-link"><button class="btn btn-default reset-options">Reset Options</button></li>
                        </ul>
                    </li> -->
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>	
                        <a href="javascript:void(0);" class="waves-effect waves-button waves-classic show-search"><i class="fa fa-search"></i></a>
                    </li>
                    <!-- <li class="dropdown">
                        <a href="#" class="dropdown-toggle waves-effect waves-button waves-red" data-toggle="dropdown"><i class="fa fa-envelope"></i><span class="badge badge-success pull-right">4</span></a>
                        <ul class="dropdown-menu title-caret dropdown-lg" role="menu">
                            <li><p class="drop-title">You have 4 new  messages !</p></li>
                            <li class="dropdown-menu-list slimscroll messages">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="#">
                                            <div class="msg-img"><div class="online on"></div>
                                            
                                            <?php echo $this->Html->image('assets/images/avatar1.png',array('class'=>'img-circle')); ?>
                                            <p class="msg-name">Sandra Smith</p>
                                            <p class="msg-text">Hey ! I'm working on your project</p>
                                            <p class="msg-time">3 minutes ago</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="msg-img"><div class="online off"></div>
                                                <?php echo $this->Html->image('assets/images/avatar1.png',array('class'=>'img-circle')); ?></div>
                                            <p class="msg-name">Amily Lee</p>
                                            <p class="msg-text">Hi David !</p>
                                            <p class="msg-time">8 minutes ago</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="msg-img"><div class="online off"></div>
                                                <?php echo $this->Html->image('assets/images/avatar1.png',array('class'=>'img-circle')); ?></div>
                                            <p class="msg-name">Christopher Palmer</p>
                                            <p class="msg-text">See you soon !</p>
                                            <p class="msg-time">56 minutes ago</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="msg-img"><div class="online on"></div><
                                                <?php echo $this->Html->image('assets/images/avatar1.png',array('class'=>'img-circle')); ?></div>
                                            <p class="msg-name">Nick Doe</p>
                                            <p class="msg-text">Nice to meet you</p>
                                            <p class="msg-time">2 hours ago</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="msg-img"><div class="online on"></div><
                                                <?php echo $this->Html->image('assets/images/avatar1.png',array('class'=>'img-circle')); ?></div>
                                            <p class="msg-name">Sandra Smith</p>
                                            <p class="msg-text">Hey ! I'm working on your project</p>
                                            <p class="msg-time">5 hours ago</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="msg-img"><div class="online off"></div>
                                                <?php echo $this->Html->image('assets/images/avatar1.png',array('class'=>'img-circle')); ?></div>
                                            <p class="msg-name">Amily Lee</p>
                                            <p class="msg-text">Hi David !</p>
                                            <p class="msg-time">9 hours ago</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="drop-all"><a href="#" class="text-center">All Messages</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle waves-effect waves-button waves-red" data-toggle="dropdown"><i class="fa fa-bell"></i><span class="badge badge-success pull-right">3</span></a>
                        <ul class="dropdown-menu title-caret dropdown-lg" role="menu">
                            <li><p class="drop-title">You have 3 pending tasks !</p></li>
                            <li class="dropdown-menu-list slimscroll tasks">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="#">
                                            <div class="task-icon badge badge-success"><i class="icon-user"></i></div>
                                            <span class="badge badge-roundless badge-default pull-right">1min ago</span>
                                            <p class="task-details">New user registered.</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="task-icon badge badge-danger"><i class="icon-energy"></i></div>
                                            <span class="badge badge-roundless badge-default pull-right">24min ago</span>
                                            <p class="task-details">Database error.</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="task-icon badge badge-info"><i class="icon-heart"></i></div>
                                            <span class="badge badge-roundless badge-default pull-right">1h ago</span>
                                            <p class="task-details">Reached 24k likes</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="drop-all"><a href="#" class="text-center">All Tasks</a></li>
                        </ul>
                    </li> -->
                    <li class="dropdown language-switch">
                        <a class="dropdown-toggle waves-effect waves-button waves-red" data-toggle="dropdown">
                            <?php 
                                if ($this->request->session()->read('Config.language') == NULL) {
                                    echo $this->Html->image('flags/en.png',['class'=>"position-left"]);
                                } else {
                                    echo $this->Html->image('flags/'.$this->request->session()->read('Config.language').'.png',['class'=>"position-left"]);
                                } 
                                echo ($this->request->session()->read('Config.language') == 'vn') ? ' VietNam ':' English ';
                            ?>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                           <li>
                                <?= $this->Html->link($this->Html->image('flags/vn.png').' VietNam', ['action' => 'changeLang', 'vn'], ['escape' => false, 'class' => 'position-left']); ?>
                            </li>
                            <li>
                                <?= $this->Html->link($this->Html->image('flags/en.png').' English', ['action' => 'changeLang', 'en'], ['escape' => false, 'class' => 'position-left']); ?>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle waves-effect waves-button waves-red" data-toggle="dropdown">
                            <span class="user-name"><?php echo $user_info['username'] ?></span>
                            <?php 
                                if (!empty($user_info['thumbnail'])) {                              
                                    echo $this->Html->image($user_info['thumbnail'],['class'=>'img-circle avatar','width'=>'40', 'height' => '40']);
                                } else {
                                    echo $this->Html->image('avatars/no-avatar.gif',['class'=>'img-circle avatar','width'=>'30', 'height' => '30']);
                                }
                            ?>
                           
                        </a>
                        <!-- <ul class="dropdown-menu dropdown-list" role="menu">
                            <li role="presentation"><a href="profile.html"><i class="fa fa-user"></i>Profile</a></li>
                            <li role="presentation"><a href="calendar.html"><i class="fa fa-calendar"></i>Calendar</a></li>
                            <li role="presentation"><a href="inbox.html"><i class="fa fa-envelope"></i>Inbox<span class="badge badge-success pull-right">4</span></a></li>
                            <li role="presentation" class="divider"></li>
                            <li role="presentation"><a href="lock-screen.html"><i class="fa fa-lock"></i>Lock screen</a></li>
                            <li role="presentation"><?php //echo $this->Html->link('<span><i class="fa fa-sign-out m-r-xs"></i>Log out</span>',array('controller'=>'users','action'=>'logout'),array('escape' => false,'class'=>'log-out waves-effect waves-button waves-red')) ?></li>
                        </ul> -->
                    </li>
                    <li>
                        <li class="active">
                            <?php echo $this->Html->link('<span><i class="fa fa-sign-out m-r-xs"></i>Log out</span>',array('controller'=>'users','action'=>'logout'),array('escape' => false,'class'=>'log-out waves-effect waves-button waves-red')) ?>
                        </li>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="waves-effect waves-button waves-red" id="showRight">
                            <i class="fa fa-comments"></i>
                        </a>
                    </li>
                </ul><!-- Nav -->
            </div><!-- Top Menu -->
        </div>
    </div>
</div><!-- Navbar -->
