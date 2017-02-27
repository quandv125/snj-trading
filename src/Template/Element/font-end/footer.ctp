<div id="footer">
    <div class="footer4">
        <div class="container">
            <div class="list-menu-footer4">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="box-menu-footer4">
                            <h2>HELP</h2>
                            <ul>
                                <?php foreach ($help as $key => $help_article): ?>
                                      <li><?php echo $this->Html->link(__($help_article), ['controller' => 'Articles', 'action' => 'details', $key]) ?>
                                      </li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="box-menu-footer4">
                            <h2>S&J Trading</h2>
                            <ul>
                                <li><?php echo $this->Html->link(__('Contact Us'), ['controller' => 'pages', 'action' => 'contacts']) ?></li>
                                <?php foreach ($snj as $key => $snj_article): ?>
                                      <li><?php echo $this->Html->link(__($snj_article), ['controller' => 'Articles', 'action' => 'details', $key]) ?>
                                      </li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </div>
                   
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="box-menu-footer4">
                            <h2>MY ACCOUNT</h2>
                            <ul>
                                <li><?php echo $this->Html->link('My Cart',['controller' => 'pages', 'action' => 'view-cart']) ?></li>
                                <li><a href="#">My Wishlist</a></li>
                                <li><a href="#">My Credit Slip</a></li>
                                <li><a href="#">My Addresses</a></li>
                                <li><a href="#"><?php echo $this->Html->link(__('My Personal In'), ['controller' => 'pages', 'action' => 'accounts']) ?></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="box-menu-footer4">
                            <h2>Contact Us</h2>
                            <ul class="footer-box-contact">
                                <li><i class="fa fa-home"></i> <a> 12C/182 Van Cao Str., Dang Giang Ward, Ngo Quyen Dist., Hai Phong City, Vietnam (181810) </a></li>
                                <li><i class="fa fa-phone"></i> <a> +83-(0)313-852-885, Fax: +84-(0)313-261-486 </a></li>
                                <li><i class="fa fa-fax"></i> <a> C.P: +84-(0)902-870-913 </a></li>
                                <li><i class="fa fa-envelope"></i> <a href="mailto:sales@snj-intl.com">sales@snj-intl.com</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End List Menu Footer -->
            <div class="list-order-policy">
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="item-order-policy">
                            <ul>
                                <li><i class="fa fa-dropbox"></i></li>
                                <li><span>ORDER ONLINE</span></li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="item-order-policy">
                            <ul>
                                <li><i class="fa fa-search" aria-hidden="true"></i></li>
                                <li><span>SEARCH PRODUCTS EASY</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="item-order-policy">
                            <ul>
                                <li><i class="fa fa-refresh"></i></li>
                                <li><span>FREE &amp; EASY RETURNS</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="item-order-policy last-item">
                            <ul>
                                <li><i class="fa fa-times-circle"></i></li>
                                <li><span>ONLINE CANCELLATIONS</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Order Policy -->
            <div class="copyright-social4">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <p class="copyrigh4">&copy;2017 <a href="#">SNJ Tradding Company</a></p>
                        <div class="policy4">
                            <label>Policies: </label>
                            <a href="#">Terms of use</a>
                            <a href="#">Security</a>
                            <a href="#">Privacy</a>
                            <a href="#">Infringement</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="payment2 payment-method">
                         <label>PAYMENT METHOD</label>
                            <a href="#"><?php echo $this->Html->image('images/home2/pay1.png') ?></a>
                            <a href="#"><?php echo $this->Html->image('images/home2/pay2.png') ?></a>
                            <a href="#"><?php echo $this->Html->image('images/home2/pay3.png') ?></a>
                            <a href="#"><?php echo $this->Html->image('images/home2/pay4.png') ?></a>
                        </div>
                    </div>
                </div>
            </div>
           
            <div class="payment4 payment-method">
                    
            </div>
        </div>
    </div>
</div>

<!-- <div class="footer5">
    <div class="container">
        <div class="footer-top footer-top5">
            <div class="logo-footer">
                <a href="#"><?php echo $this->Html->image('images/home5/logo-footer.png') ?></a>
            </div>
            <div class="menu-footer">
                <ul>
                    <li><a href="#">Online Shopping</a></li>
                    <li><a href="#">Buy</a></li>
                    <li><a href="#">Sell</a></li>
                    <li><a href="#">All Promotions</a></li>
                    <li><a href="#">My Orders </a></li>
                    <li><a href="#">Help</a></li>
                    <li><a href="#">Site Map</a></li>
                    <li><a href="#">Customer Service</a></li>
                    <li><a href="#">About </a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
        </div>
       
        <div class="online-shipping">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="item-online-shipping">
                        <ul>
                            <li><i class="fa fa-credit-card"></i></li>
                            <li>
                                <h3><a href="#">CREATE card</a></h3>
                                <p>Create a free account so you can claim your $100 Reward.</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="item-online-shipping">
                        <ul>
                            <li><i class="fa fa-dropbox"></i></li>
                            <li>
                                <h3><a href="#">Order online</a></h3>
                                <p>Hours: 8AM - 11PM </p>
                                <span>All day in week</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="item-online-shipping">
                        <ul>
                            <li><i class="fa fa-motorcycle"></i></li>
                            <li>
                                <h3><a href="#">Free Shipping</a></h3>
                                <p>Sollicitudin mauris cursus </p>
                                <span>On orders over $99</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="item-online-shipping">
                        <ul>
                            <li><i class="fa fa-cubes"></i></li>
                            <li>
                                <h3><a href="#">Free Returns</a></h3>
                                <p>Nulla tempus sollicitud </p>
                                <span>On all orders.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="list-footer-box5">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-box">
                        <h2>My Account</h2>
                        <ul class="footer-menu-box">
                            <li><a href="#">My orders</a></li>
                            <li><a href="#">My credit slips</a></li>
                            <li><a href="#">My addresses</a></li>
                            <li><a href="#">My personal info</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-box">
                        <h2>Help</h2>
                        <ul class="footer-menu-box">
                            <li><a href="#">Where's my order?</a></li>
                            <li><a href="#">Contact us</a></li>
                            <li><a href="#">Payments</a></li>
                            <li><a href="#">Redeem a gift voucher</a></li>
                            <li><a href="#">Delivery &amp; returns</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-box">
                        <h2>Further information</h2>
                        <ul class="footer-menu-box">
                            <li><a href="#">Drop Everything</a></li>
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Affiliate programme</a></li>
                            <li><a href="#">Privacy</a></li>
                            <li><a href="#">Terms &amp; conditions</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-box">
                        <h2>Contact Us</h2>
                        <ul class="footer-box-contact">
                            <li><i class="fa fa-home"></i> Our business address is 1063 Free lon Street San Francisco, CA 95108</li>
                            <li><i class="fa fa-mobile"></i> + 020.566.8866</li>
                            <li><i class="fa fa-envelope"></i> <a href="mailto:support@7-Up.com">support@7-Up.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="footer-bottom5">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="copyright">
                        <p>&copy; 2017 SNJ Tradding Company. All Rights Reserved</p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="payment2 payment-method">
                        <a href="#"><?php //echo $this->Html->image('images/home2/pay1.png') ?></a>
                        <a href="#"><?php //echo $this->Html->image('images/home2/pay2.png') ?></a>
                        <a href="#"><?php //echo $this->Html->image('images/home2/pay3.png') ?></a>
                        <a href="#"><?php //echo $this->Html->image('images/home2/pay4.png') ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->