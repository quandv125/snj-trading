<div class="mini-cart mini-cart-2">
  <!--   <a href="cart" class="header-mini-cart2">
        <span class="total-mini-cart-icon"><i class="fa fa-shopping-basket"></i></span>
        <span class="total-mini-cart-item"><?php echo count($this->request->session()->read('Cart')) ?></span>

    </a> -->
    <?php echo $this->Html->link('<span class="total-mini-cart-icon"><i class="fa fa-shopping-basket"></i></span>
        <span class="total-mini-cart-item">'.count($this->request->session()->read('Cart')).'</span>',
            ['controller'=>'pages','action'=> 'view_cart'],
            ['escape'=> false,'class'=>'header-mini-cart2']); 
    ?>
  <!--   <div class="content-mini-cart">
        <h2>(2) ITEMS IN MY CART</h2>
        <ul class="list-mini-cart-item">
            <li>
                <div class="mini-cart-edit">
                    <a class="delete-mini-cart-item" href="#"><i class="fa fa-trash-o"></i></a>
                    <a class="edit-mini-cart-item" href="#"><i class="fa fa-pencil"></i></a>
                </div>
                <div class="mini-cart-thumb">
                    <a href="#"><img alt="" src="/img/images/home1/mini-cart-thumb.png"></a>
                </div>
                <div class="mini-cart-info">
                    <h3><a href="#">Burberry Pink &amp; black</a></h3>
                    <div class="info-price">
                        <span>$59.52</span>
                        <del>$17.96</del>
                    </div>
                    <div class="qty-product">
                        <span class="qty-down">-</span>
                        <span class="qty-num">1</span>
                        <span class="qty-up">+</span>
                    </div>
                </div>
            </li>
            <li>
                <div class="mini-cart-edit">
                    <a class="delete-mini-cart-item" href="#"><i class="fa fa-trash-o"></i></a>
                    <a class="edit-mini-cart-item" href="#"><i class="fa fa-pencil"></i></a>
                </div>
                <div class="mini-cart-thumb">
                    <a href="#"><img alt="" src="/img/images/home1/mini-cart-thumb.png"></a>
                </div>
                <div class="mini-cart-info">
                    <h3><a href="#">Burberry Pink &amp; black</a></h3>
                    <div class="info-price">
                        <span>$59.52</span>
                        <del>$17.96</del>
                    </div>
                    <div class="qty-product">
                        <span class="qty-down">-</span>
                        <span class="qty-num">1</span>
                        <span class="qty-up">+</span>
                    </div>
                </div>
            </li>
        </ul>
        <div class="mini-cart-total">
            <label>TOTAL</label>
            <span>$24.28</span>
        </div>
        <div class="mini-cart-button">
            <a class="mini-cart-view" href="#">view my cart </a>
            <a class="mini-cart-checkout" href="#">Checkout</a>
        </div>
    </div> -->
</div>